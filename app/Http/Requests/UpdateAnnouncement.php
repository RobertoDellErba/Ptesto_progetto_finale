<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required | max: 100 | min: 10',
            'body'=>'required | min: 10',
            'price'=>'required | max: 7',
            // 'category'=>'required',
            // 'location'=>'required',
            // 'images'=>'image | mimes:jpeg,png,jpg,gif,svg | max:10000 | required'
        ];
    }

    public function messages(){

        return [
            'title.required'=>'Inserisci un titolo per l\'annuncio',
            'body.required'=>'inserisci una descrizione per il tuo prodotto',
            'title.max'=>'Il titolo del tuo annuncio supera i caratteri previsti',
            'title.min'=>'Questo titolo è troppo corto',
            'body.min'=>'Aggiungi più dettagli per il tuo prodotto',     
            'price.required'=>'E\' necessario inserire il prezzo',  
            'price.max'=>"Il prezzo proposto è esagerato. C'è qualcosa che non và", 
            // 'category.required'=>'Seleziona una categoria',
            // 'location.required'=>'Seleziona una località',
            // 'images.required'=>'Immagine richiesta'
        ];
    }
}
