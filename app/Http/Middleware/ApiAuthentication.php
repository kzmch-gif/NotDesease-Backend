<?php
namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class ApiAutentication {
    use ApiResponse;

    const API_KEY_HEADER = 'x-api-key';

    public function handle(Request $request, Closure $next){
        $token = $request->header(key:self::API_KEY_HEADER);

        if  ($token ===null){
            return $this->sendError(error:'Unauthorized.', code: 401);
        }

        if  ($token !== config(key:'services.api.token')){
            return $this->sendError(error:'Unauthorized.', code: 401);
        }

        return $next($request);
    }
}
?>