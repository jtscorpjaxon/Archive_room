  # Project Archive Room
        

## Loyiha haqida
Bu loyiha arxiv xonasi modellashtirilgan bo'lib,bunda arxiv xonasidagi
javonlar,ularda esa papkalar joylashgan, 
har bir papka o'z o'rniga ya'ni yacheykasiga 
ega. 

Birinchi ishga tushurish uchun migratsiyani ishga tushiring:
<br>
php artisan migrate
<br>
<br>
Keyin,
<br> 
php artisan db:seed --class=FakeTables
<br> 
<br> 
 Shundan so'ng brauzerdan ma'lumotlarni qayta ishlashingiz 
 mumkin
 <img src="/storage/home.jpg">
 <img src="/storage/board.jpg">
 <img src="/storage/folder.jpg">
 <img src="/storage/files.jpg">
 Masalani qo'yilishi
 -Juda ko'p arxiv shkaflari bo'lgan katta xona bor
 
 - Arxiv xonasida bir nechta javonlar mavjud
 
 - Har bir javondagi katakka 10-15 ta papka sig'adi
 
 - Bitta papkada bir nechta qog'ozli fayllar bo'lishi mumkin
 
 Berilgan:
 
 - Har bir Arxiv-shkafning o'ziga xos identifikatsiya raqami mavjud
 
 - Har bir katakning o'ziga xos identifikatsiya raqami mavjud
 
 - Har bir papkaning o'ziga xos identifikatsiya raqami bilan xarakterlanadi
 
 Vazifa:
 
 - Kerakli papkani topish qiyinligi
 
 ** Ushbu loyihani funsiyalari **
 
 - shkaf va katakni ko'rsatadigan papka hosil qilish mumkin
 
 - papkani boshqa shkafning boshqa joyiga ko'chirish mumkin
 
 - raqamlangan fayllarni ko'rish va papkaga qo'shish mumkin
 
 - Qaysi shkafda va qaysi katakda ekanligini bilish uchun noyob identifikator orqali papkani qidirib topish mumkin
