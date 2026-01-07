<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $posts = [
        [
            'id' => 1,
            'title' => 'Şönil Çiçeklerin Bakımı ve Temizliği',
            'slug' => 'sonil-cicek-bakimi-ve-temizligi',
            'image' => 'https://images.unsplash.com/photo-1627920769854-35bb63c87141?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'summary' => 'El yapımı şönil çiçeklerinizin ilk günkü gibi canlı ve temiz kalması için uygulayabileceğiniz pratik yöntemler ve uzun ömürlü kullanım ipuçları.',
            'content' => '
                <p>Şönil çiçekler, dayanıklı yapıları ve solmayan güzellikleri ile bilinir. Ancak her dekoratif ürün gibi, zamanla tozlanabilirler. İşte çiçeklerinizi ilk günkü gibi parlak tutmanın yolları:</p>
                
                <h4>1. Hafif Toz Alma</h4>
                <p>Haftalık temizlik rutininizde, tüylü bir toz alma püskülü veya yumuşak uçlu bir fırça kullanarak çiçeklerin üzerindeki tozları nazikçe alabilirsiniz. Şönil ipliklerin yapısını bozmamak için sert hareketlerden kaçının.</p>

                <h4>2. Yapışkan Rulo Kullanımı</h4>
                <p>Kıyafetler için kullanılan tüy toplayıcı yapışkan rulolar, şönil üzerindeki inatçı tozları almak için harika bir çözümdür. Ruloyu çiçeğin yapraklarında nazikçe gezdirin.</p>

                <h4>3. Nemli Bez ile Silme</h4>
                <p>Eğer lekelenme olursa, hafif nemli (ıslak değil) bir mikrofiber bez ile lekeyi tampon hareketlerle temizleyebilirsiniz. Kesinlikle çamaşır suyu veya ağır kimyasallar kullanmayın.</p>

                <h4>4. Uzun Ömürlü Kullanım</h4>
                <p>Çiçeklerinizi doğrudan, çok yoğun ve sürekli güneş ışığına maruz bırakmamak, renklerin canlılığını yıllarca korumasına yardımcı olur.</p>
            ',
            'date' => '07 Ocak 2026',
            'author' => 'Ayşe Yılmaz'
        ],
        [
            'id' => 2,
            'title' => 'Renklerin Dili: Hangi Renk Ne Anlama Gelir?',
            'slug' => 'renklerin-dili-ve-anlamlari',
            'image' => 'https://images.unsplash.com/photo-1507290439931-a861b5a38200?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'summary' => 'Hediye seçerken veya evinizi dekore ederken renklerin gücünden faydalanın. Kırmızı tutkuyu, beyaz masumiyeti simgeler. Peki ya diğerleri?',
            'content' => '
                <p>Çiçeklerin dili yüzyıllardır insanlar arasında gizli bir iletişim aracı olmuştur. Şönil çiçeklerimizde de bu renklerin enerjisini yansıtıyoruz. İşte popüler renklerin anlamları:</p>
                
                <h4>Kırmızı: Tutku ve Aşk</h4>
                <p>Kırmızı güller ve laleler, derin bir sevgiyi ve tutkuyu ifade eder. Sevgililer Günü ve yıldönümleri için vazgeçilmezdir.</p>

                <h4>Beyaz: Masumiyet ve Saygı</h4>
                <p>Beyaz çiçekler saf duyguları, yeni başlangıçları ve saygıyı temsil eder. Gelin buketlerinde ve tebrik hediyelerinde sıkça tercih edilir.</p>

                <h4>Sarı: Dostluk ve Neşe</h4>
                <p>Sarı, enerjisi en yüksek renklerden biridir. Arkadaşlığı, sıcaklığı ve mutluluğu simgeler. Hasta ziyaretleri veya "geçmiş olsun" dilekleri için harikadır.</p>

                <h4>Pembe: Zarafet ve Şefkat</h4>
                <p>Pembe tonları, nezaketi, hayranlığı ve şefkati ifade eder. Anneler Günü için en popüler renklerden biridir.</p>

                <h4>Mor: Asalet ve Başarı</h4>
                <p>Mor renk, asilliği ve başarıyı temsil eder. Yeni iş tebrikleri veya mezuniyet hediyeleri için ideal bir seçimdir.</p>
            ',
            'date' => '05 Ocak 2026',
            'author' => 'Selin Yıldız'
        ],
        [
            'id' => 3,
            'title' => 'Özel Günler İçin Hediye Fikirleri',
            'slug' => 'ozel-gunler-icin-hediye-fikirleri',
            'image' => 'https://images.unsplash.com/photo-1516961642265-531546e84af2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'summary' => 'Sevgililer günü, anneler günü veya doğum günleri... Sevdiklerinize kalıcı bir anı bırakmak için yaratıcı ve el emeği hediye önerileri.',
            'content' => '
                <p>Hediye vermek bir sanattır. Özellikle el yapımı bir hediye, karşınızdaki kişiye "Senin için zaman ayırdım ve emek verdim" demenin en güzel yoludur. İşte şönil çiçeklerle hazırlayabileceğiniz hediye fikirleri:</p>
                
                <h4>1. Kişiye Özel Buketler</h4>
                <p>Hediye alacağınız kişinin en sevdiği renklerden oluşan, asla solmayacak bir buket hazırlatabilirsiniz. Üzerine iliştireceğiniz el yazısı bir not ile değeri paha biçilemez olur.</p>

                <h4>2. Dekoratif Kutu Düzenlemeleri</h4>
                <p>Şık bir kutu içerisinde, çikolatalarla veya küçük aksesuarlarla harmanlanmış şönil çiçek düzenlemeleri, modern ve lüks bir hediye seçeneğidir.</p>

                <h4>3. Tek Dalın Zarafeti</h4>
                <p>Bazen tek bir dal, koca bir buketten daha çok şey anlatır. Minimalist cam bir vazo içerisinde sunulan tek dal büyük boy bir şönil gül, zarif bir jesttir.</p>

                <h4>4. Kapı Süsleri ve Çelenkler</h4>
                <p>Yeni evlenen veya yeni eve taşınan dostlarınız için, kapılarına asabilecekleri "Hoş Geldiniz" temalı şönil çiçek çelenkleri harika bir ev hediyesidir.</p>
            ',
            'date' => '01 Ocak 2026',
            'author' => 'Mehmet Demir'
        ],
    ];

    /**
     * Blog ana sayfasını gösterir.
     */
    public function index()
    {
        return view('blog', ['posts' => $this->posts]);
    }

    /**
     * Blog detay sayfasını gösterir.
     */
    public function show($slug)
    {
        // Slug'a göre postu bul (Basit array araması)
        $post = collect($this->posts)->firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        return view('blog-detay', compact('post'));
    }
}
