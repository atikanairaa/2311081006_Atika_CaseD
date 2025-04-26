<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_peserta' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'nama_kursus' => $this->faker->randomElement(['Pemrograman Web Dasar','Pelatihan Public Speaking','Desain Grafis','Belajar Bahasa Inggris']),
            'kategori_kursus' => $this->faker->randomElement(['Teknologi Informasi','Pengembangan Diri','Desain','Bahasa']),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'status_pendaftaran' => $this->faker->randomElement(['terdaftar', 'aktif', 'selesai', 'dibatalkan'])
        ];
    }
}
