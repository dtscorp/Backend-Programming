<?php

class Animal
{
    private $animals;

    public function __construct($data)
    {
        $this->animals = $data;
    }

    public function index()
    {
        foreach ($this->animals as $animal) {
            echo $animal;
            echo '<br>';
        }
    }

    public function store($data)
    {
        array_push($this->animals, $data);
    }

    public function update($index, $data)
    {
        array_splice($this->animals, $index, 1, $data);
    }

    public function destroy($index)
    {
        array_splice($this->animals, $index, 1);
    }
}

$animal1 = new Animal(['Ayam', 'Ikan']);

echo 'Index - Menampilkan seluruh hewan <br>';
$animal1->index();
echo '<br>';

echo 'Store - Menambahkan hewan baru (burung) <br>';
$animal1->store('Burung');
$animal1->index();
echo '<br>';

echo 'Update - Mengupdate hewan <br>';
$animal1->update(0, 'Ikan Lele');
$animal1->index();
echo '<br>';

echo 'Destroy - Menghapus hewan <br>';
$animal1->destroy(2);
$animal1->index();
echo '<br>';
