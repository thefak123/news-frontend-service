<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class NewsController extends Controller
{
    //

    public function index(){
        
        // $response = Http::withToken(session("token"))->get('http://localhost:9000/news');
       
        try {
            $response = Http::retry(3, 100)  // Retry the request up to 3 times
                            ->timeout(5)     // Set timeout for the request
                            ->get('http://localhost:9000/news');
            
            if ($response->successful()) {
                // Process the successful response
               
                return view("tech-index", ["news" =>$response->json("data")]);;
            } else {
                // Handle the unsuccessful response
                return response()->json(['error' => 'Failed to retrieve the resource.'], $response->status());
            }
        } catch (ConnectionException $e) {
            // Handle the connection exception (e.g., cURL error 7)
            return view("unavailablepage", ["serviceName" =>"news"]);
        } catch (RequestException $e) {
            // Handle other request-related exceptions
            $statusCode = $e->response ? $e->response->status() : null;
           if($statusCode == 503){
                return view("unavailablepage", ["serviceName" =>"news"]);
           }
           
        } catch (\Exception $e) {
            // Handle any other exceptions
            return view("unavailablepage", ["serviceName" =>"news"]);
        }
    }

    public function getNewsById($id){
        // $response = Http::withToken(session("token"))->get('http://localhost:9000/news/' . $id);
    
       

        try {
            $response = Http::retry(3, 100)  // Retry the request up to 3 times
                            ->timeout(5)     // Set timeout for the request
                            ->get('http://localhost:9000/news/' . $id);
        
            if ($response->successful()) {
                // Process the successful response
           
                return view("tech-single", ["news" =>$response->json("data"), "id" => $id]);
            } else {
                // Handle the unsuccessful response
                return response()->json(['error' => 'Failed to retrieve the resource.'], $response->status());
            }
        } catch (ConnectionException $e) {
            // Handle the connection exception (e.g., cURL error 7)
            return view("unavailablepage", ["serviceName" =>"news"]);
        } catch (RequestException $e) {
            // Handle other request-related exceptions
            return view("requestfailed");
        } catch (\Exception $e) {
            // Handle any other exceptions
            return view("unavailablepage", ["serviceName" =>"news"]);
        }
        
        
    }
}
