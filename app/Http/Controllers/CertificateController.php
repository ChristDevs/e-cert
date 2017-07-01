<?php

namespace App\Http\Controllers;

use App\Traits\Updatable;
use App\Entities\Person;
use App\Support\FileUpload;
use App\Entities\Certificate;
use Illuminate\Database\Eloquent\Collection;

class CertificateController extends Controller
{
    use FileUpload, Updatable;
    /**
     * Certificate model instance.
     *
     * @var mixed
     **/
    protected $cert;
    /**
     * Person model instance.
     *
     * @var mixed
     **/
    protected $people;

    /**
     * Create a new controller instance.
     *
     * @param Certificate $cert
     * @param Person      $people
     **/
    public function __construct(Certificate $cert, Person $people)
    {
        $this->middleware('auth');
        $this->cert = $cert;
        $this->people = $people;
    }

    /**
     * Fire events and flash notifications.
     *
     * @param Certificate $cert
     **/
    protected function created(Certificate $cert)
    {
        flash_message("Your application for {$cert->type} certificate for {$cert->person->fullname} was submited successfully!. You will be notified upon approval", 'success', 'Application Submited');
    }

    /**
     * Get certificates based on category.
     *
     * @param string $type
     *
     * @return Collection
     **/
    protected function getCertificates(string $type): Collection
    {
        $certs = $this->cert->where('type', $type)->get();
        if (auth()->user()->hasRole('user')) {
            $certs = auth()->user()->certs()->where('type', $type)->get();
        }

        return $certs;
    }
}
