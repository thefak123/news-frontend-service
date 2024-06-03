<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class LoginForm extends Component
{
    public $email;
    public $password;

    public function login(){
        
    

        try {
            $response = Http::retry(3, 100)  // Retry the request up to 3 times
                            ->timeout(5)     // Set timeout for the request
                            ->post('http://localhost:9000/auth/login', [
                                'email' => $this->email,
                                'password' => $this->password,
                            ]);
        
            if ($response->successful()) {
                // Process the successful response
                session(['token' => $response->json("token")]);
                session()->flash('success', 'Login is succeed');
                
                $this->redirectRoute('home');
            } else {
                // Handle the unsuccessful response
                session()->flash('error', 'Login is failed, please check all of the inputs');
            }
        } catch (ConnectionException $e) {
            // Handle the connection exception (e.g., cURL error 7)
            session()->flash('error', 'Authentication service is unavailable, please try again later');
        } catch (RequestException $e) {
            // Handle other request-related exceptions
            session()->flash('error', "Please check your credentials");
        } catch (\Exception $e) {
            // Handle any other exceptions
            session()->flash('error', "Please check your credentials");
        }
    }
    public function render()
    {
        return view('livewire.login-form');
    }
}
