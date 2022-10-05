<?php

namespace App\Console\Commands;

use App\User;
use Botble\AwRequest\Models\AwRequest;
use Botble\AwRequest\Models\BlockRecord;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Ecommerce\Models\Product;
use Botble\PressReleaseArchive\Models\PressReleaseArchive;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Theme\NewsTv\Models\CurrencyAPI as ModelsCurrencyAPI;

class CurrencyAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'currency-api:update';
    protected $postRepository;



    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'update currencies use api';

    protected $api_base_url = 'https://api.currencyapi.com/v3/latest?apikey=';
    protected $api_url_params= '&currencies=EUR%2CUSD%2CCAD%2CJOD%2CSAR%2CAED&base_currency=TND';

    protected $x_access_token_2   = 'TdmMCseDaCFzEMJcdfUI9kTcqmUeOlsiqaLC3tXb';
    protected $x_access_token = 'SGB9PWE9jlI3xyVGFoFNDlTIANjbVWGgndO2lxWV';
    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct( PostInterface $postRepository)
    {
        parent::__construct();

        $this->postRepository = $postRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       //dd(setting('api_currency_counter_1')); ;
        $use_api_1=false;
        $use_api_2=false;
        $api_currency_counter_1=setting()->get('api_currency_counter_1');
        // setting()->set('api_currency_counter_1',1)->save();
        if(!$api_currency_counter_1){
            $use_api_1=true;
            setting()->set('api_currency_counter_1',1)->save();
        }

        else if($api_currency_counter_1<300){
            $use_api_1=true;
            setting()->set('api_cold_counter_1',$api_currency_counter_1+1)->save();
        }else if($api_currency_counter_1>=300){
            $api_currency_counter_2=setting()->get('api_currency_counter_2');
             if(!$api_currency_counter_2){
                setting()->set('api_currency_counter_2',1)->save();
                $use_api_2=true;
             }
             else if($api_currency_counter_2<300){
                    setting()->set('api_currency_counter_2',$api_currency_counter_2+1)->save();
                    $use_api_2=true;
             }else{
                setting()->set('api_currency_counter_1',1)->save();
                setting()->set('api_currency_counter_2',0)->save();
                $use_api_1=true;
             }
        }


        if($use_api_1)
        $api_url= $this->api_base_url.''.$this->x_access_token .''.$this->api_url_params;

        else $api_url= $this->api_base_url.''.$this->x_access_token_2 .''.$this->api_url_params;

        try{
            $client = new Client();

            $response = $client->request('GET', $api_url, [
                'headers' => [
                    //'x-access-token' => $x_access_token,'Content-Type'=> 'application/json'
                    ]

            ]);
            $contents = $response->getBody()->getContents();
            $res= json_decode($contents);


            //dd($res);

            ModelsCurrencyAPI::InsertFromAPI($res->data,$res->meta->last_updated_at);

        }catch(Exception $e){
            dd($e);
        }

    }


}
