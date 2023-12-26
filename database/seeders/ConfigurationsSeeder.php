<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Configurations\Configuration;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Settings
        $settings = [
    'app_name' => [ 'option_value' => 'CMS SKELETON', 'input_type' => 'text' ],
    'title' => [ 'option_value' => 'CMS SKELETON', 'input_type' => 'text' ],
    'company_name' => [ 'option_value' => 'CMS SKELETON', 'input_type' => 'text' ],
    'favicon' => [ 'option_value' => '/assets/images/logo.png', 'input_type' => 'file' ],
    'logo' => [ 'option_value' => '/assets/images/logo.png', 'input_type' => 'file' ],
    'author_image' => [ 'option_value' => '/assets/images/logo.png', 'input_type' => 'file' ],
    'main_og' => [ 'option_value' => '/assets/images/logo.png', 'input_type' => 'file' ],
    'phone_number' => [ 'option_value' => '0247207085', 'input_type' => 'text' ],
    'whatsapp_number' => [ 'option_value' => '0598638224', 'input_type' => 'text' ],
    'address' => [ 'option_value' => 'Accra, Ghana', 'input_type' => 'text' ],
    'country' => [ 'option_value' => 'Ghana', 'input_type' => 'text' ],
    'keywords' => [ 'option_value' => 'machine, real estate, cars, escavators, rover, land, hardware', 'input_type' => 'text' ],
    'author' => [ 'option_value' => 'CMS SKELETON', 'input_type' => 'text' ],
    'description' => [ 'option_value' => 'CMS SKELETON’ vision is to contribute to social change and development of individuals, communities and societies by providing management expertise, so together we can create a better, more equitable world.', 'input_type' => 'text' ],
    'email' => [ 'option_value' => 'info@web.com', 'input_type' => 'text' ],
    'facebook' => [ 'option_value' => 'http://www.facebook.com/', 'input_type' => 'text' ],
    'twitter'=> [ 'option_value' => 'https://twitter.com/', 'input_type' => 'text' ],
    'instagram'=> [ 'option_value' => 'https://www.instagram.com/', 'input_type' => 'text' ],
    'youtube' => [ 'option_value' => 'http://www.youtube.com', 'input_type' => 'text' ],
    'linkedin' => [ 'option_value' => 'https://www.linkedin.com/', 'input_type' => 'text' ],
    'time_zone' => [ 'option_value' => 'Africa/Accra', 'input_type' => 'text' ],
    'date_format' => [ 'option_value' => 'd-M-Y', 'input_type' => 'text' ],
    'currency'=> [ 'option_value' => 'GHS', 'input_type' => 'text' ],
    'currency_symbol'=> [ 'option_value' => '₵', 'input_type' => 'text' ],
    'working_time_from' => [ 'option_value' => 'Mon - Thur : 7AM - 12AM','input_type' => 'text' ],
    'working_time_to' => [ 'option_value' => 'Fri - Sun : 7AM - Till Late','input_type' => 'text' ],
    'location' => [ 'option_value' => ' Accra, Ghana.','input_type' => 'text' ],


        ];

        foreach ($settings as $key => $value)
        {
            if ($conf=Configuration::where('option_key',$key)->first()) {
               $conf->option_value = $value['option_value'];
               $conf->input_type = $value['input_type'];
               $conf->save();
            }else{
                Configuration::insert([
                    'option_key' => $key,
                    'option_value' => $value['option_value'], 
                    'input_type' => $value['input_type'],
                   ]);
            }
        }





        /// seed sliders

        $sliders = [
                '1' => [
                    'text_1' => 'Easiest way to Rent your Dream Apartment',
                    'text_2' => 'This is a description for the first slide.',
                    'image' => '/assets/images/hero_bg_1.jpg',
                ],
                '2' => [
                    'text_1' => 'Easiest way to Rent your Dream Apartment',
                    'text_2' => 'This is a description for the first slide.',
                    'image' => '/assets/images/hero_bg_2.jpg',
                ],
           ];

           foreach ($sliders as $key => $value)
        {
            if ($slide=Slider::where('text_1',$value['text_1'])->first()) {
               $slide->text_1 = $value['text_1'];
               $slide->text_2 = $value['text_2'];
               $slide->image = $value['image'];
               $slide->order = $key;
               $slide->save();
            }else{
                Slider::insert([
                    'order' => $key,
                    'text_1' => $value['text_1'], 
                    'text_2' => $value['text_2'],
                    'image' => $value['image'],
                   ]);
            }
        }

        // seed admin user


        if(!User::where('email','admin@gmail.com')->first()) {
            $user = new User;
            $user->name = 'Admin';
            $user->email = 'admin@gmail.com';
            $user->password = Hash::make('admin');
            $user->save();
        }

    }
}
