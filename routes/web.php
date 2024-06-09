<?php

use App\Http\Controllers\NewsController;
use App\Http\Middleware\CheckIfLoggedIn;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

Route::get('/', [NewsController::class, "index"])->name("home");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::get('/dashboard', function () {
    
   
    $newsData = null;
    $usersData = null;
    $commentsData = null;
    try {
        $response = Http::retry(3, 100)  // Retry the request up to 3 times
                        ->timeout(5)     // Set timeout for the request
                        ->get('http://localhost:9017/news');
        
        if ($response->successful()) {
            // Process the successful response
           
            $newsData = $response->json("data");
        } else {
            // Handle the unsuccessful response
            return response()->json(['error' => 'Failed to retrieve the resource.'], $response->status());
        }
    } catch (ConnectionException $e) {
        // Handle the connection exception (e.g., cURL error 7)
        // return view("unavailablepage", ["serviceName" =>"news"]);
    } catch (RequestException $e) {
        // Handle other request-related exceptions
        $statusCode = $e->response ? $e->response->status() : null;
       if($statusCode == 503){
            // return view("unavailablepage", ["serviceName" =>"news"]);
       }
       
    } catch (\Exception $e) {
        // Handle any other exceptions
        // return view("unavailablepage", ["serviceName" =>"news"]);
    }

    try {
        $response = Http::retry(3, 100)  // Retry the request up to 3 times
                        ->timeout(5)     // Set timeout for the request
                        ->get('http://localhost:9017/auth/all');
        
        if ($response->successful()) {
            // Process the successful response
           
            $usersData = $response->json();
        } else {
            // Handle the unsuccessful response
            return response()->json(['error' => 'Failed to retrieve the resource.'], $response->status());
        }
    } catch (ConnectionException $e) {
        // Handle the connection exception (e.g., cURL error 7)
        // return view("unavailablepage", ["serviceName" =>"news"]);
    } catch (RequestException $e) {
        // Handle other request-related exceptions
        $statusCode = $e->response ? $e->response->status() : null;
       if($statusCode == 503){
            // return view("unavailablepage", ["serviceName" =>"news"]);
       }
       
    } catch (\Exception $e) {
        // Handle any other exceptions
        // return view("unavailablepage", ["serviceName" =>"news"]);
    }

    try {
        $response = Http::retry(3, 100)  // Retry the request up to 3 times
                        ->timeout(5)     // Set timeout for the request
                        ->get('http://localhost:9017/comments/all');
        
        if ($response->successful()) {
            // Process the successful response
           
            $commentsData = $response->json('data');
        } else {
            // Handle the unsuccessful response
            return response()->json(['error' => 'Failed to retrieve the resource.'], $response->status());
        }
    } catch (ConnectionException $e) {
        // Handle the connection exception (e.g., cURL error 7)
        // return view("unavailablepage", ["serviceName" =>"news"]);
    } catch (RequestException $e) {
        // Handle other request-related exceptions
        $statusCode = $e->response ? $e->response->status() : null;
       if($statusCode == 503){
            // return view("unavailablepage", ["serviceName" =>"news"]);
       }
       
    } catch (\Exception $e) {
        // Handle any other exceptions
        // return view("unavailablepage", ["serviceName" =>"news"]);
    }
    return view('dashboard', ["news" => $newsData, "comments" => $commentsData, "users" => $usersData]);
})->name("dashboard");

Route::get('/news/{id}', [NewsController::class, "getNewsById"])->name("PageDetail");
