<?php
declare(strict_types = 1);
/**
 * /src/Rest/Interfaces/ControllerInterface.php
 */

namespace App\Rest\Interfaces;

use App\Rest\Controller;
use App\Rest\ResponseHandler;
use LogicException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;
use UnexpectedValueException;

/**
 * Interface ControllerInterface
 *
 * @package App\Rest\Interfaces
 */
interface ControllerInterface
{
    /**
     * @param RestResourceInterface $resource
     *
     * @return ControllerInterface|Controller|self
     */
    public function setResource(RestResourceInterface $resource);

    /**
     * @throws UnexpectedValueException
     *
     * @return RestResourceInterface
     */
    public function getResource(): RestResourceInterface;

    /**
     * @required
     *
     * @param ResponseHandler $responseHandler
     *
     * @return ControllerInterface|Controller|self
     */
    public function setResponseHandler(ResponseHandler $responseHandler);

    /**
     * @throws UnexpectedValueException
     *
     * @return ResponseHandlerInterface
     */
    public function getResponseHandler(): ResponseHandlerInterface;

    /**
     * Getter method for used DTO class for current controller.
     *
     * @param string|null $method
     *
     * @throws UnexpectedValueException
     *
     * @return string
     */
    public function getDtoClass(?string $method = null): string;

    /**
     * Method to validate REST trait method.
     *
     * @param Request  $request
     * @param string[] $allowedHttpMethods
     *
     * @throws LogicException
     * @throws MethodNotAllowedHttpException
     */
    public function validateRestMethod(Request $request, array $allowedHttpMethods): void;

    /**
     * Method to handle possible REST method trait exception.
     *
     * @param Throwable $exception
     *
     * @throws HttpException
     *
     * @return Throwable
     */
    public function handleRestMethodException(Throwable $exception): Throwable;

    /**
     * Method to process current criteria array.
     *
     * @param array $criteria
     */
    public function processCriteria(array &$criteria): void;
}