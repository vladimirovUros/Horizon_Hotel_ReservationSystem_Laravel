<?php

namespace App\Http\Controllers;

use App\Models\LogActions;
use App\Models\Menu;
use App\Models\Social;
use Database\Seeders\SocialSeeder;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["socialMedias"] = Social::getSocials();
        $this->data["menu"] = Menu::getMenu();
    }

    protected function logAction(Request $request, $action, $user_id = null)
    {
        try {
            $log = new LogActions();
            $log::create([
                'ip_address' => $request->ip(),
                'user_id' => $user_id,
                'activity' => $action,
                'path' =>  $request->path()
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return $e->getMessage();
        }
    }
}
