<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalkulator extends CI_Controller {

    public function index() {
        $data = [];

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $gender = $this->input->post('gender');
            $age = (int) $this->input->post('age');
            $weight = (float) $this->input->post('weight');
            $height = (float) $this->input->post('height');
            $activityLevel = $this->input->post('activityLevel');
            $height_m = $height / 100;
            $bmi = $weight / ($height_m * $height_m);

            if ($gender && $age && $weight && $height && $activityLevel) {
                if ($gender === 'Pria') {
                    $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
                } else {
                    $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
                }

                switch ($activityLevel) {
                    case 'rendah': $calories = $bmr * 1.2; break;
                    case 'sedang': $calories = $bmr * 1.55; break;
                    case 'tinggi': $calories = $bmr * 1.9; break;
                    default: $calories = $bmr * 1.2;
                }

                if ($bmi < 18.5) {
                    $kategori_bmi = 'Kurus';
                } elseif ($bmi < 25) {
                    $kategori_bmi = 'Normal';
                } elseif ($bmi < 30) {
                    $kategori_bmi = 'Gemuk';
                } else {
                    $kategori_bmi = 'Obesitas';
                }

                $data['hasil'] = [
                    'kalori' => round($calories),
                    'protein' => round($weight * 0.8),
                    'lemak' => round(($calories * 0.25) / 9),
                    'karbohidrat' => round(($calories * 0.5) / 4),
                    'serat' => $gender === 'Pria' ? 38 : 25,
                    'bmi' => round($bmi, 1),
                    'kategori_bmi' => $kategori_bmi
                ];
            }

            // Simpan juga input agar bisa ditampilkan ulang
            $data['input'] = [
                'gender' => $gender,
                'age' => $age,
                'weight' => $weight,
                'height' => $height,
                'activityLevel' => $activityLevel
            ];
        }

        $this->load->view('main', $data);
    }
}
