<?php

namespace App\Http\Controllers;

use App\Enum\CertificatePrice;
use App\Http\Requests\CertificateStoreRequest;
use App\Repository\Certificate\Contract\CertificateRepositoryInterface;
use App\Services\CertificateService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateController extends Controller
{
    private CertificateRepositoryInterface $certificateRepository;
    private CertificateService $certificateService;

    public function __construct(CertificateRepositoryInterface $certificateRepository,
                                CertificateService $certificateService)
    {
        $this->middleware(['auth']);
        $this->certificateRepository = $certificateRepository;
        $this->certificateService = $certificateService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $pricePerTree = CertificatePrice::PRICE_PER_TREE;

        return \view('pages.welcome', compact('pricePerTree'));
    }

    public function store(CertificateStoreRequest $certificateStoreRequest)
    {
        return $this->certificateRepository->store($certificateStoreRequest);
    }

    public function activates()
    {
        return $this->certificateService->activates();
    }

    public function certificateActivate(Request $request)
    {
        return $this->certificateService->certificateActivate($request);
    }

    public function softDelete($id)
    {
        return $this->certificateRepository->softDelete($id);
    }
}
