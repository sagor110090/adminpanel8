<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Artisan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    public function crud()
    {
        return view('crud.index');
    }
    public function jsonSave(Request $request)
    {
        $request->validate([
            'modelName' => 'required',
        ]);
        $validate = [];
        $formdata = [];
        $relationships = [];
        $foreign_keys = [];
        DB::table('crud')->truncate();
        $myFile = "data.json";
        $arr_data = [];

        try
        {
            if ($request->name != null) {
                foreach ($request->name as $i => $value) {
                    $formdata[$i] = [
                        'name' => Str::lower($request->name[$i]),
                        'type' => $request->type[$i],
                    ];
                }
            }

            if ($request->referencesTable != null) {
                foreach ($request->referencesTable as $i => $value) {
                    if ($request->referencesTable[$i] != null) {
                        $foreign_keys[$i] = [
                            "column" => Str::lower($request->name[$i]),
                            "references" => $request->referencesField[$i],
                            "on" => $request->referencesTable[$i],
                            "onDelete" => "cascade",

                        ];
                    }
                }
            }
            $foreign_keys = array_values($foreign_keys);
            if ($request->name) {
                foreach ($request->name as $i => $value) {
                    if ($request->required[$i] != 'not') {
                        $validate[$i] = [
                            'field' => Str::lower($request->name[$i]),
                            'rules' => $request->required[$i],
                        ];
                    }
                }
            }
            if ($request->rname != null) {
                foreach ($request->rname as $i => $value) {
                    $relationships[$i] = [
                        'name' => $request->rname[$i],
                        'class' => $request->class[$i],
                        'type' => $request->rtype[$i],
                    ];
                }
            }

            $final = [
                'fields' => $formdata,
                'foreign_keys' => $foreign_keys,
                'validations' => $validate,
                'relationships' => $relationships,
            ];

            $jsondata = file_get_contents($myFile);
            $final = json_encode($final);
            DB::table('crud')->insert([
                'content' => $final,
            ]);

            $arr_data = json_decode($jsondata, true);
            $jsondata = json_encode($final, JSON_PRETTY_PRINT);
            $res = DB::table('crud')->first();
            if (file_put_contents($myFile, $res->content)) {
                echo 'Data successfully saved';
            } else {
                echo "error";
            }

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        if ($request->name != null) {

            // Artisan::call('migrate');

            // Artisan::call('crud:generate "' . $request->modelName . '" --fields_from_file="data.json" --view-path="' . $request->view_path . '" --controller-namespace="' . $request->controller_namespace . '" --route-group=' . $request->route_group . '" --form-helper=html --model-namespace=Models --localize=yes --locales=en,bn,es,fr');

            Artisan::call('crud:generate "' . $request->modelName . '" --fields_from_file="data.json" --view-path="' . $request->view_path . '" --controller-namespace="' . $request->controller_namespace . '" --route-group=' . $request->route_group . '" --form-helper=html --model-namespace=Models ');

            return redirect('/crud2index#modelId')->with('success', 'make successfully!');

        }
        return redirect()->back()->with('error', 'error Give the input carefully!');

    }

    public function migrate()
    {
        Artisan::call('migrate');
    }
}
