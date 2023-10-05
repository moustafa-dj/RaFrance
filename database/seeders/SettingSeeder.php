<?php

namespace Database\Seeders;
use App\Models\SiteSetting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'key' => 'Contactez-nous',
                'value' => '<ul>
                    <li>Ra France est le spécialiste du montage de rayonnage.</li>
                    <li> Demandez votre devis en ligne.</li>
                    <li>+33 7 84 38 88 49</li>
                    <li>izzedineallouache@gmail.com</li>
                </ul>',
            ],
            [
                'key' => 'nos domaines',
                'value' => '<ul>
                    @foreach($domainlinks as $domainlink)
                        <li><a href="{{route(\'\domaind\'\,[\'\id\'\ => $domainlink->id])}}">{{$domainlink->link}}</a></li>
                    @endforeach
                </ul>',
            ],
            [
                'key' => 'Nos services',
                'value' => '<ul>
                    <li>Achat de rayonnage métallique</li>
                    <li>Contrôle de rack à palettes</li>
                    <li>montage de rack</li>
                </ul>',
            ],
            [
                'key' => 'Notre entreprise',
                'value' => '<ul>
                <li><a href="{{route(\'\contact\'\)}}"></a></li> 
                <li><a href="{{route(\'\/\'\)}}">Ra France</a></li>
                </ul>',
            ],
        ];

        SiteSetting::insert($records);
    }
}
