<?php

namespace Luffy\ApiLog\Http\Middleware;

use \Luffy\ApiLog\Models\ApiLog as LogModel;

class ApiLog
{
    /**
     * @param        $request
     * @param        $next
     * @param string $groupName
     *
     * @return mixed
     */
    public function handle($request, $next, string $groupName = 'default')
    {
        if (config('api-log.enable')) {
            LogModel::create([
                'ip'         => $request->getClientIp(),
                'group_name' => $groupName,
                'method'     => $request->method(),
                'url'        => $request->url(),
                'header'     => json_encode($request->header(), true),
                'body'       => json_encode($request->input(), true),
            ]);
        }

        return $next($request);
    }
}
