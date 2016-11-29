<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BadDomain;
use App\Click;

class LinkController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referers = [
            ['param1' => 'qwerty', 'param2' => 'qwerty2'],
            ['param1' => 'yuiop', 'param2' => 'yuiop2'],
            ['param1' => 'defaultLink', 'param2' => 'defaultLink2'],
            ['param1' => 'developer', 'param2' => 'developers2'],
        ];
        return view('link.index', [
            'referers' => $referers
        ]);
    }

    /**
     * @param Request $request
     * @param $param1
     * @param $param2
     * @return \Illuminate\Http\JsonResponse
     */
    public function click(Request $request, $param1, $param2)
    {
        $redirectToGoogle = false;
        $error = false;
        $referer = $request->headers->get('referer');
        $domain = $this->getDomainFromUrl($referer);

        $data = [
            'ua' => $request->header('User-Agent'),
            'ref' => $request->headers->get('referer'),
            'ip' => $request->getClientIp(),
            'param1' => $param1,
            'param2' => $param2
        ];

        if (BadDomain::isBadDomain($domain)) {

            $redirectToGoogle = true;

            $result = Click::firstOrCreate($data);
            if ($result->id) {
                Click::updateClick($referer, $param1, $result->error, 1);

                $error = true;
            } else {
                $result->id = Click::getLastInsertId();
                Click::updateClick($referer, $param1, false, 1);
            }
        } else {
            $result = Click::firstOrCreate($data);

            if ($result->id) {
                Click::updateClick($referer, $param1, $result->error, 1);
                BadDomain::insert(['name' => $domain]);
                $error = true;
            } else {
                $result->id = Click::getLastInsertId();
            }
        }

        return response()->json([
            'id' => $result->id,
            'redirectToGoogle' => $redirectToGoogle,
            'error' => $error
        ]);
    }

    /**
     * Get domain from url
     *
     * @param $url
     * @return string
     */
    public function getDomainFromUrl($url)
    {
        $url = parse_url($url, PHP_URL_HOST);

        $url = preg_replace('/^w+[0-9]*\./i', '', $url);

        $domainParts = explode('.', trim($url, '.'));
        $pcount = count($domainParts);

        if (($subDomainsCount = $pcount - 3) > 0) {
            for ($i = 0; $i < $subDomainsCount; $i++) {
                unset($domainParts[$i]);
            }
            $pcount = count($domainParts);
        }
        if ($pcount == 3) {
            reset($domainParts);
            if (!preg_match('/^(com|co)$/is', next($domainParts))) {
                array_shift($domainParts);
            }
        }
        return implode('.', $domainParts);
    }
}
