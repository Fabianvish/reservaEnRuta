<?php

namespace App\Livewire\Reservation;

use App\Models\Passenger;
use App\Models\Reservation;
use App\Models\Tour;
use Livewire\Component;

class Form extends Component
{
    public $reservation, $run, $name, $residence, $statusPassenger =NULL;

    public $reservation_code, $tour_id, $passenger_id, $status, $payment_method, $currency, $children_count, $adult_count, $third_age_count;

    public function mount(Reservation $reservation){

        $this->reservation_code = $reservation->reservation_code;
        if ($this->reservation) {
            $this->tour_id = $reservation->tour_id;
        }else{
            $this->tour_id = 1;
        }
        $this->passenger_id = $reservation->passenger_id;
        $this->status = $reservation->status;
        $this->payment_method = $reservation->payment_method;
        $this->currency = $reservation->currency;
        $this->children_count = $reservation->children_count;
        $this->adult_count = $reservation->adult_count;
        $this->third_age_count = $reservation->third_age_count;
    }

    public function createPassenger(){
        $passenger = Passenger::where('run', $this->run)->first();

        if($passenger){
            $this->statusPassenger = true;
        }else{
            $this->statusPassenger = false;
        }

    }

    public function saveOrUpdate(){
        $data = $this->all();
        $passenger = Passenger::where('run', $this->run)->first();
        $this->passenger_id = $passenger->id;

        $data['passenger_id'] = $this->passenger_id;

        dd($data);
    }


    public function render()
    {
        $tours = Tour::where('status', 1)->get();
        $tour = Tour::find($this->tour_id);


        $this->currency = $tour->destination->adult_price*$this->adult_count + $tour->destination->children_price * $this->children_count + $tour->destination->third_age_price * $this->third_age_count;
        return view('livewire.reservation.form', compact('tours'));
    }
}
