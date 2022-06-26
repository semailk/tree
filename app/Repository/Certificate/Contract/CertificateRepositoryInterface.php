<?php


namespace App\Repository\Certificate\Contract;


use App\Http\Requests\CertificateStoreRequest;

interface CertificateRepositoryInterface
{
public function store(CertificateStoreRequest $certificateStoreRequest);
public function softDelete(int $id);
}
