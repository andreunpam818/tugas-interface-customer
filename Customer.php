<?php 
    class Customer
    {
        private string $name;
        private string $email;
        private string $noHp;
        private string $nik;
        private string $alamat;
        private string $provinsi;
        private string $kota;
        private string $kabupaten;
        private string $kodePos;
        private string $tempatLahir;
        private string $tanggalLahir;
        private string $namaOrtu;

        public function __construct(string $name, string $email, string $noHp, string $nik, string $alamat, string $provinsi, string $kota, string $kabupaten, string $kodePos, string $tempatLahir, string $tanggalLahir, string $namaOrtu)
        {
            $this->name = trim($name);
            $this->email = trim($email);
            $this->noHp = trim($noHp);
            $this->nik = trim($nik);
            $this->alamat = trim($alamat);
            $this->provinsi = trim($provinsi);
            $this->kota = trim($kota);
            $this->kabupaten = trim($kabupaten);
            $this->kodePos = trim($kodePos);
            $this->tempatLahir = trim($tempatLahir);
            $this->tanggalLahir = trim($tanggalLahir);
            $this->namaOrtu = trim($namaOrtu);
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getNoHp(): string
        {
            return $this->noHp;
        }

        public function getNik(): string
        {
            return $this->nik;
        }

        public function getAlamat(): string
        {
            return $this->alamat;
        }

        public function getProvinsi(): string
        {
            return $this->provinsi;
        }

        public function getKota(): string
        {
            return $this->kota;
        }

        public function getKabupaten(): string
        {
            return $this->kabupaten;
        }

        public function getKodePos(): string
        {
            return $this->kodePos;
        }

        public function getTempatLahir(): string
        {
            return $this->tempatLahir;
        }

        public function getTanggalLahir(): string
        {
            return $this->tanggalLahir;
        }

        public function getNamaOrtu(): string
        {
            return $this->namaOrtu;
        }
    }



?>