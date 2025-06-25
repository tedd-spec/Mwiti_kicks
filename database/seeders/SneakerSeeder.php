use Illuminate\Database\Seeder;
use App\Models\Sneaker;

class SneakerSeeder extends Seeder
{
    public function run(): void
    {
        $sneakers = [
            [
                'title' => 'Nike Air Max 270',
                'brand' => 'Nike',
                'size' => '42',
                'price' => 150.00,
                'image_url' => 'airmax270.jpg',
                'is_new' => true,
            ],
            [
                'title' => 'Yeezy Boost 350',
                'brand' => 'Adidas',
                'size' => '43',
                'price' => 300.00,
                'image_url' => 'yeezy350.jpg',
                'is_new' => true,
            ],
            [
                'title' => 'Jordan 1 Retro High',
                'brand' => 'Nike',
                'size' => '44',
                'price' => 250.00,
                'image_url' => 'jordan1.jpg',
                'is_new' => true,
            ],
            [
                'title' => 'Puma RS-X³',
                'brand' => 'Puma',
                'size' => '42',
                'price' => 120.00,
                'image_url' => 'pumarsx.jpg',
                'is_new' => true,
            ],
        ];

        foreach ($sneakers as $sneaker) {
            Sneaker::create($sneaker);
        }
    }
}
