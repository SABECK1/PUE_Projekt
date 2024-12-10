<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * "The attributes that are mass assignable."
     * Dies sind die Attribute des Users, welche durch Massenpflege editiert werden können.
     * Heißt: Wenn ich ein Update auf die Datenbanktabelle machen möchte, dann müssen die Attribute die ich verändern möchte
     * hier in diesem Array stehen. Sie sind somit "fillable" also füllbar durch den Endanwender.
     * Referenziere: https://laravel.com/docs/11.x/eloquent#mass-assignment
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'vorname',
        'nachname',
        'email',
        'password',
        'role_id'
    ];

    /**
     * "The attributes that should be hidden for serialization."
     * Es gibt Funktionen wie $User->to_array(), welche alle in der Datenbank vorhandenen Attribute des entsprechenden Users
     * in ein zugehöriges assoziatives Array schreibt. Dies ist beim Passwort, als auch beim Token nicht erwünscht, da es sich
     * um sensible Daten handelt. Dementsprechend werden diese IMMER versteckt mit dieser Regel
     * Referenziere: https://laravel.com/docs/11.x/eloquent-serialization#hiding-attributes-from-json
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * "Get the attributes that should be cast".
     *
     * @return array<string, string>
     * Heißt-> Diese Methode gibt ein assoziatives Array zurück, in diesem Falle {"email_verified_at"->"datetime"}
     * In Laravel wird bei Zugriff auf diese Objekte z.B. durch $User->email_verified_at; dieses Array abgegriffen
     * Nun sieht der Controller, dass der Value "Datetime" ist, und konvertiert dieses Datenelement automatisch
     * in ein Datumszeitfeld
     * Referenziere https://laravel.com/docs/11.x/eloquent-mutators#date-casting
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
