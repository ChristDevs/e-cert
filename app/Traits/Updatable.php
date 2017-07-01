<?php

namespace App\Traits;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Entities\Certificate;
use Illuminate\Http\RedirectResponse;
use App\Notifications\CertificateReady;
use App\Notifications\CertificateProcessed;
use App\Notifications\CertificateApplicationDeclined;
use App\Notifications\CertificateApplicationRevoked;

trait Updatable
{
    /**
     * Update and handle certificate requests.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request): RedirectResponse
    {
        $user = auth()->user();
        if ($user->hasRole(['admin', 'owner', 'officer'])) {
            $cert = Certificate::findOrFail($id);
            $data = [
                'processed' => true,
                'status' => 'processed',
            ];
            switch ($request->get('action')) {
                case 'decline':
                    if ($user->hasRole('owner')) {
                        $data['status'] = 'declined';
                        $data['process_notes'] = $request->get('proccess_notes');
                        $this->notify($cert->createdBy, new CertificateApplicationDeclined($cert));
                        $data['proccessed_on'] = Carbon::now();
                    }
                    break;
                case 'revoke':
                    if ($user->hasRole('officer')) {
                        $data['status'] = 'revoked';
                        $data['auth_on'] = Carbon::now();
                        $data['process_notes'] = $request->get('notes');
                        $this->notify($cert->createdBy, new CertificateApplicationRevoked($cert));
                    }
                    break;
                case 'process':
                    if ($user->hasRole('owner')) {
                        $data['process_notes'] = $request->get('proccess_notes');
                        $data['proccessed_on'] = Carbon::now();
                         $this->notify($cert->createdBy, new CertificateProcessed($cert));
                    }
                    break;
                case 'approve':
                    if ($user->hasRole('officer')) {
                        $data['approval_notes'] = $request->get('notes');
                        $data['auth_on'] = Carbon::now();
                        $data['approved'] = true;
                        $data['serial_number'] = 'temp';
                        $data['status'] = 'approved';
                        $data['auth_by'] = $user->id;
                        $this->notify($cert->createdBy, new CertificateReady($cert));
                    }
                    break;
                default:
                    $data = [
                        'processed' => false,
                    ];
                    break;
            }
            $cert->update($data);
        }

        return withInfo();
    }
    /**
     * Send notification
     *
     * @param User $user
     * @param  $notification
     *
     * @return bool
     **/
    protected function notify(User $user, $notification) : bool
    {
        try {
            $user->notify($notification);
            return true;
        } catch (\Swift_TransportException $e) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $cert = $this->cert->find($id);
        $original = clone $cert;
        $cert->delete();
        return redirectWithInfo(route($original->type.'.index'));
    }
}
