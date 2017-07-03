<?php

namespace App\Http\Controllers;

use App\Entities\Certificate;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Certificate
     *
     * @var string
     **/
    protected $cert;
    /**
     * Create a new controller instance.
     */
    public function __construct(Certificate $cert)
    {
        $this->middleware('auth');
        $this->cert = $cert;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = $this->getCertificates(['status' => 'pending']);
        $revoked = $this->getCertificates(['status' => 'revoked']);
        $processed = $this->getCertificates(['status' => 'processed']);
        $approved = $this->getCertificates(['status' => 'approved']);
        $certs = $this->getCertificates();
        
        return view('home', compact('pending', 'revoked', 'processed', 'approved', 'certs'));
    }
    /**
     * Get certificates based on category.
     *
     * @param string $type
     *
     * @return Collection
     **/
    protected function getCertificates(array $options = null): Collection
    {
        $certs = $this->cert;
        if (auth()->user()->hasRole('user')) {
            $certs = auth()->user()->certs();
        }
        if ($options) {
            return $certs->where($options)->get();
        }
        return $certs->get();
    }
}
