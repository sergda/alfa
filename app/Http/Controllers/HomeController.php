<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Models\Main;
use App\Models\Design;
use App\Models\Beds;
use App\Models\Mattress;
use App\Models\Curbstones;
use App\Models\Pouffes;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */

    protected $design;

    public function __invoke(Main $main, Design $design)
    {
        //dd(phpinfo());
        $this->design = $design;
        $main_page_design = $this->design->whereActive(true)->get();
        $this->model = $main;
        $main_page_slider = $this->model->whereActive(true)->get();
        return view('front.index', compact('main_page_slider', 'main_page_design'));
    }

    public function contatto() {
        return view('front.contatto.show');
    }

    public function storia(Main $main, Design $design) {
        $this->design = $design;
        $main_page_design = $this->design->whereActive(true)->get();
        $this->model = $main;
        $main_page_slider = $this->model->whereActive(true)->get();
        return view('front.storia.show', compact('main_page_slider', 'main_page_design'));
    }

    public function collezione(Beds $beds, Mattress $mattress, Curbstones $curbstones, Pouffes $pouffes) {

        //$beds_main = $beds->whereIs_main(true)->whereActive(true)->first();
        $beds_count = $beds->whereActive(true)->count();
        //$mattress_main = $mattress->whereIs_main(true)->whereActive(true)->first();
        $mattress_count = $mattress->whereActive(true)->count();
        //$curbstones_main = $curbstones->whereIs_main(true)->whereActive(true)->first();
        $curbstones_count = $curbstones->whereActive(true)->count();
        //$pouffes_main = $pouffes->whereIs_main(true)->whereActive(true)->first();
        $pouffes_count = $pouffes->whereActive(true)->count();


        return view('front.common_template.collesione', compact('beds_count', 'mattress_count', 'curbstones_count', 'pouffes_count'));
    }

    public function postSend(PostRequest $request) {

        $errors = [];

        if(Input::get("catalogueFeedback") && Input::get("name") && strlen(Input::get("name")) > 1){
            $errors['code'] = "Вы ведете себя как робот";
        }
        $fields = [
            "name" => "Тьфу",
            "code" => "code",
//            "phone" => "Телефон",
            "email" => "E-mail",
            "subject" => "Заголовок",
        ];

        if ( (!Input::get("catalogueFeedback") && !Input::get("name") ) || (!Input::get("catalogueFeedback") && !strlen(Input::get("name")) > 1) )
            $errors['name'] = "Введите имя";

        if ( (Input::get("catalogueFeedback") && !Input::get("code") ) || (Input::get("catalogueFeedback") && !strlen(Input::get("code")) > 1) )
            $errors['code'] = "Please, indicate № CODE";

        if (!Input::get("email") || !strlen(Input::get("email")) > 1)
            $errors['email'] = "Please, indicate Your e-mail";
/*
        if (!Input::get("phone") || !strlen(Input::get("phone")) > 1)
            $errors['phone'] = "Введите телефон!";
        else
            if (!preg_match("/^(?:\+?[7,8][-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{2})[-. ]?([0-9]{2})$/", Input::get("phone")))
                $errors['phone'] = "Не верный формат";
*/
        if (count($errors) == 0) {

            $templates = (Input::get("catalogueFeedback")) ? 'emails.catalogue_admin' : 'emails.request' ;

            Mail::send($templates, ["fields" => Input::all(), "needed" => $fields], function(\Illuminate\Mail\Message $message)
            {
                $message->to('info@trois-couronnes.ch', ' ')->subject('Заявка с сайта Trois Couronnes: '. Input::get("subject") );
            });

            if(Input::get("catalogueFeedback")){
                Mail::send('emails.catalogue_client', ["fields" => Input::all(), "needed" => $fields], function(\Illuminate\Mail\Message $message)
                {
                    $message->to(Input::get("email"), ' ')->subject('Trois Couronnes: Thank you! code accepted' );
                });
            }

            $comment = "";
            foreach($fields as $key=>$field) {
                if ($key == "name" || $key == "phone")
                    continue;

                if (Input::get($key))
                    $comment .= $field . ": " . Input::get($key). "; ";

            }
//			$url = $this->sendRequest(["name" => Input::get("name"), "phone" => Input::get("phone"), "email" => Input::get("email"), "comment" => $comment]);
            
            return Response::json(array("successMessage" => "allGood", "status" => true));

        } else {
            //return Redirect::back()->with('type', 'section')->withErrors($validator)->withInput();
            return Response::json(array("fieldErrors" => $errors));
        }

    }

}
