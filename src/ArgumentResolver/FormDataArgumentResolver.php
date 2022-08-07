<?php

namespace App\ArgumentResolver;

use App\DTO\ClientData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class FormDataArgumentResolver implements ArgumentValueResolverInterface
{
    private ClassMetadataFactoryInterface $factory;
    private DenormalizerInterface $denormalizer;

    public function __construct(ClassMetadataFactoryInterface $factory, DenormalizerInterface $denormalizer)
    {
        $this->factory = $factory;
        $this->denormalizer = $denormalizer;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        if (null === $argument->getType() || !class_exists($argument->getType())) {
            return false;
        }

        return $argument->getType() === ClientData::class;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        $type = $argument->getType();

        yield  $this->denormalizer->denormalize($request->request->all('access_form'), $type);
    }
}

