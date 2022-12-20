<?php

namespace App\ArgumentResolver;

use App\DTO\ClientData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class FormDataArgumentResolver implements ArgumentValueResolverInterface
{
    public function __construct(private readonly DenormalizerInterface $denormalizer)
    {

    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        if ($request->getContent() === '') {
            return false;
        }

        return $argument->getType() === ClientData::class;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        yield  $this->denormalizer->denormalize($request->request->all('access_form'), $argument->getType());
    }
}

