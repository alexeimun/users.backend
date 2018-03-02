<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Illuminate\Database\QueryException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

use Zend\Diactoros\Response as Psr7Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        OAuthServerException::class,
        AuthenticationException::class
    ];
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        if ($e instanceof ModelNotFoundException) {
            return $this->handlerModelNotFound($request, $e);
        }elseif($e instanceof ValidationException){
            return $this->handlerValidationException($request, $e);
        }elseif($e instanceof NotFoundHttpException){
            return $this->hanlderNotFoundHttp($request, $e);
        }elseif($e instanceof MethodNotAllowedHttpException){
            return $this->handlerMethodNotAllowed($request,$e);
        }elseif($e instanceof AuthenticationException){
            return $this->handlerAuthentication($request,$e);
        }elseif($e instanceof OAuthServerException){
            return $this->handlerOAuthServer($request,$e);
        }elseif($e instanceof QueryException){
            return $this->handlerQueryException($request,$e);
        }elseif($e instanceof UserInvalid){
            return $this->handlerUserInvalid($request,$e);
        }elseif($e instanceof TokenInvalid){
            return response()->json([
                'status_code' => '400', 
                'error' => 'Token invalid'
            ], 400);
        }

        return parent::render($request, $e);
    }


    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Illuminate\Http\Response
     */
    protected function handlerUserInvalid($request, UserInvalid $e){

        return response()->json([
            'status_code' => '400', 
            'error' => 'User invalid'
        ], 400);
        
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Illuminate\Http\Response
     */
    protected function handlerQueryException($request, QueryException $e){

        return response()->json([
            'status_code' => '500', 
            'error' => $e->previous->getMessage()
        ], 500);
        
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Illuminate\Http\Response
     */
    protected function handlerAuthentication($request, AuthenticationException $e){

        return response()->json([
            'status_code' => '401', 
            'error' => 'Unauthenticated'
        ], 401);
        
    }

    /**
     * Convert an model not found exception into an 404 response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\ModelNotFoundException  $e
     * @return \Illuminate\Http\Response
     */

    protected function handlerModelNotFound($request, ModelNotFoundException $e){
        
        return response()->json([
            'status_code' => '404', 
            'msg' => 'Model not found' 
        ], 404);
    }


    /**
     * Convert an validation exception into an 422 response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\ModelNotFoundException  $e
     * @return \Illuminate\Http\Response
     */

    protected function handlerValidationException($request, ValidationException $e){
        $errors = $e->validator->errors()->getMessages();
        
        return response()->json([
            'status_code' => '422',
            'error' => $errors 
            
        ], 422); 
    }


    /**
     * Convert an not found http exception into an route not found response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\ModelNotFoundException  $e
     * @return \Illuminate\Http\Response
     */

    protected function hanlderNotFoundHttp($request, NotFoundHttpException $e){
        return response()->json([
            'status_code' => '404',
            'message' => 'Route not found' 
        ], 404); 
    }

    /**
     * Convert an not found http exception into an route not found response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\ModelNotFoundException  $e
     * @return \Illuminate\Http\Response
     */

    protected function handlerMethodNotAllowed($request, MethodNotAllowedHttpException $e){
        return response()->json([
            'status_code' => '405',
            'message' => 'Method not allowed' 
        ], 405); 
    }


    protected function handlerOAuthServer($request, OAuthServerException $e){

       return $e->generateHttpResponse(new Psr7Response);
    }

}
