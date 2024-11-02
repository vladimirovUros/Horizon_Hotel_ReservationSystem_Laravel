<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $rooms = [
        [
            'name' => 'Grandeur Room',
            'size' => '50',
            'description' => 'This spacious room offers ultimate luxury and comfort, with elegant design and luxurious amenities. Ideal for guests seeking an exclusive experience.
             Experience the epitome of luxury in our Presidential Grandeur Room. Designed for discerning guests who seek opulence and comfort, this spacious retreat offers an indulgent escape from the hustle and bustle of the city. Whether you are here for business or pleasure, immerse yourself in elegance and sophistication. Just like the exclusive limousines of New York City, our Presidential Grandeur Room promises a lavish experience that exceeds expectations. With amenities fit for royalty and unparalleled service, your stay with us will be nothing short of extraordinary',
            'main_image_path' => 'soba1.1.jpg',
            'type_id' => 1,
        ],
        [
            'name' => ' Oasis Room',
            'size' => '35',
            'description' => 'This room is perfect for business travelers, featuring a spacious work desk and a comfortable living area. Access to all necessary amenities for a productive stay.
             Welcome to your Executive Oasis Room, where comfort meets productivity in the heart of the city. Ideal for business travelers seeking a tranquil space to work and unwind, this room offers a seamless blend of functionality and relaxation. Just like the convenience of New York limo service, our Executive Oasis Room provides a hassle-free experience, allowing you to focus on what matters most. With modern amenities and a soothing ambiance, you will find solace amidst the chaos of urban life. Let us take care of your needs while you enjoy a peaceful retreat in the midst of the bustling city.',
            'main_image_path' => 'soba1.2.jpg',
            'type_id' => 2,
        ],
        [
            'name' => 'Haven Room',
            'size' => '33',
            'description' => 'This room is designed as a sanctuary from everyday stress, with luxurious details and a comfortable space for relaxation. The perfect place for unwinding and enjoyment.
            Step into luxury and tranquility in our Luxury Haven Room, where every detail is designed to elevate your stay to new heights. From the moment you enter, you will be greeted by a sense of serenity and refinement that sets us apart. Just like the comfort of a limousine ride through the streets of New York City, our Luxury Haven Room offers a sanctuary from the chaos of urban life. Relax and rejuvenate in style, surrounded by elegant furnishings and top-of-the-line amenities. Whether you are here for business or pleasure, indulge in the ultimate luxury experience that awaits you.',
            'main_image_path' => 'soba3.1_.jpg',
            'type_id' => 3,
        ],
        [
            'name' => 'SkyView Sanctuary Room',
            'size' => '60',
            'description' => 'This spacious suite is located on the top floor with spectacular views of the city. Luxuriously furnished with a private terrace and all necessary amenities for a comfortable stay.
            Welcome to the pinnacle of luxury living in our Penthouse SkyView Sanctuary. Perched atop the city skyline, this spacious suite offers breathtaking views and unparalleled comfort. Just like the exclusivity of a private limousine, our Penthouse SkyView Sanctuary provides a VIP experience that is second to none. Whether you are hosting a private gathering or seeking a romantic escape, indulge in the ultimate luxury retreat. With deluxe amenities and personalized service, your every need will be catered to with precision and care. Experience luxury redefined in our Penthouse SkyView Sanctuary.',
            'main_image_path' => 'soba4.4.jpg',
            'type_id' => 4,
        ],
        [
            'name' => 'Comfort Haven Room',
            'size' => '42',
            'description' => 'This room combines luxury and comfort, with modern design and carefully selected amenities. Ideal for relaxing after a long day of sightseeing.
             Experience the epitome of comfort and style in our Deluxe Comfort Haven. Designed with your relaxation in mind, this spacious room offers a serene retreat from the hustle and bustle of the city. Just like the convenience of New York limo service, our Deluxe Comfort Haven provides a seamless experience that exceeds expectations. Unwind in luxury with plush furnishings and modern amenities that cater to your every need. Whether you are here for business or pleasure, immerse yourself in the tranquility of our Deluxe Comfort Haven and enjoy a truly unforgettable stay.',
            'main_image_path' => 'soba5.1.jpg',
            'type_id' => 5,
        ],
        [
            'name' => 'Serene Room',
            'size' => '36',
            'description' => 'This room provides peace and comfort, with bright and spacious surroundings. A perfect option for a comfortable stay at an affordable price.
            Welcome to your Standard Serene Oasis, where simplicity meets tranquility in the heart of the city. Designed for comfort and convenience, this cozy room offers a peaceful retreat from the chaos of urban life. Just like the reliability of a New York City cab, our Standard Serene Oasis provides a hassle-free experience that ensures a comfortable stay. Relax and recharge in style with modern amenities and a soothing ambiance that invites you to unwind. Whether you are here for business or pleasure, enjoy the simplicity and serenity of our Standard Serene Oasis.',
            'main_image_path' => 'soba6.1.jpg',
            'type_id' => 6,
        ],
        [
            'name' => 'Cozy Room',
            'size' => '23',
            'description' => 'This family room offers comfortable accommodation at an affordable price, with enough space for the whole family. A perfect choice for travelers on a budget.
           Welcome to your Economy Cozy Family Suite, where affordability meets comfort for the whole family. Designed with your budget in mind, this spacious suite offers ample space and essential amenities for a relaxing stay. Just like the accessibility of New York limo service, our Economy Cozy Room provides a convenient and stress-free experience that ensures a memorable stay. Unwind in comfort with cozy furnishings and thoughtful touches that cater to your familys needs. Whether you are here for sightseeing or family fun, enjoy a comfortable and affordable stay in our Economy Cozy Family Suite.',
            'main_image_path' => 'soba7.1.jpg',
            'type_id' => 7,
        ],
        [
            'name' => 'Blissful Room',
            'size' => '44',
            'description' => 'his room is ideal for a family vacation, with comfortable beds and additional space for entertainment. Spacious and pleasant, it provides everything needed for an unforgettable stay with the family.
            Experience the joy of family travel in our Family Blissful Room, where comfort and excitement await. Designed with families in mind, this spacious room offers plenty of space and essential amenities for a memorable stay. Just like the excitement of exploring New York City, our Family Blissful Adventure Room provides endless opportunities for fun and adventure. Relax and recharge in style with comfortable furnishings and thoughtful touches that cater to your familys needs. Whether you are here for sightseeing or family bonding, create unforgettable memories in our Family Blissful Room.',
            'main_image_path' => 'soba8.1.jpg',
            'type_id' => 8,
        ],
        [
            'name' => 'Serenity Room',
            'size' => '48',
            'description' => 'Welcome to the Serenity Room, where tranquility and comfort intertwine to create a peaceful retreat. Nestled within our serene accommodations, this room offers a haven of calm amidst the bustling world outside. Just like the gentle rustle of leaves in a quiet forest, the Serenity Room envelops you in a sense of peace and relaxation. Relax in style amidst soft, neutral tones and cozy furnishings, designed to soothe the senses and promote restful sleep. Whether you are seeking a moment of quiet reflection or simply looking to unwind after a long day of exploration, the Serenity Room provides a sanctuary where you can escape the stresses of daily life and find solace in luxurious comfort. Experience the serenity and tranquility of the Serenity Room, where every detail is crafted with your relaxation and well-being in mind.',
            'main_image_path' => 'soba9.1.jpg',
            'type_id' => 2,
        ],
        [
            'name' => 'Retreat Room',
            'size' => '38',
            'description' => 'Welcome to the Retreat Room, a serene haven where tranquility and relaxation converge. Tucked away within our tranquil accommodations, this room offers a peaceful retreat from the stresses of everyday life. Just like a secluded sanctuary nestled amidst natures embrace, the Retreat Room invites you to unwind and recharge in blissful solitude. Relax in comfort amidst soothing earth tones and plush furnishings, creating an ambiance of calm and serenity. Whether you are seeking a moment of quiet reflection or simply yearning for a restful nights sleep, the Retreat Room provides a sanctuary where you can escape the chaos of the outside world and reconnect with your inner self. Experience the rejuvenating power of the Retreat Room, where every detail is thoughtfully curated to ensure a truly restorative stay.',
            'main_image_path' => 'soba10.1.jpg',
            'type_id' => 3,
        ],
        [
            'name' => 'Elegance Room',
            'size' => '55',
            'description' => 'Welcome to the Elegance Room, where sophistication and luxury intertwine to create an exquisite experience. Situated within our prestigious accommodations, this room offers a refined retreat for discerning guests. Just like the timeless allure of a classic masterpiece, the Elegance Room exudes an aura of grace and refinement, with tasteful decor and opulent furnishings. Relax in style amidst soft, neutral tones and elegant accents that evoke a sense of understated glamour. Whether you are here for business or leisure, the Elegance Room provides a sanctuary of style and comfort where you can unwind and rejuvenate in unparalleled luxury. Experience the epitome of elegance and sophistication in the Elegance Room, where every detail is designed to exceed your expectations and elevate your stay to new heights of grandeur.',
            'main_image_path' => 'soba11.1.jpg',
            'type_id' => 5,
        ],
        [
            'name' => 'Panorama Room',
            'size' => '78',
            'description' => 'Welcome to the Panorama Room, where breathtaking views and luxurious comfort await. Perched within our esteemed accommodations, this room offers an unparalleled vantage point to soak in the beauty of the surrounding landscape. Just like the sweeping vistas of a panoramic landscape, the Panorama Room invites you to indulge in the splendor of your surroundings. Relax in style as floor-to-ceiling windows flood the room with natural light, providing a stunning backdrop for your stay. Whether you are here to unwind after a day of exploration or simply to revel in the beauty of nature, the Panorama Room offers a serene sanctuary where you can escape the ordinary and embrace the extraordinary. Experience the height of luxury and sophistication in the Panorama Room, where every moment is elevated by the awe-inspiring panorama that surrounds you.',
            'main_image_path' => 'soba12.1.jpg',
            'type_id' => 1,
        ],
        [
            'name' => 'Tranquility Room',
            'size' => '50',
            'description' => '
            Welcome to the Tranquility Room, where serenity and comfort harmonize to create an oasis of calm. Nestled within our serene accommodations, this room offers a peaceful retreat for weary travelers seeking relaxation and rejuvenation. Just like the gentle flow of a tranquil stream, the Tranquility Room envelops you in a sense of tranquility and inner peace. Relax amidst soothing hues and plush furnishings, allowing the stresses of the day to melt away. Whether you are here for a restful nights sleep or a moment of quiet reflection, the Tranquility Room provides a sanctuary where you can escape the chaos of the outside world and find solace in luxurious comfort. Experience the soothing embrace of the Tranquility Room, where every detail is designed to enhance your sense of well-being and inner harmony.',
            'main_image_path' => 'soba13.1.jpg',
            'type_id' => 7,
        ],
        [
            'name' => 'Ambiance Room',
            'size' => '18',
            'description' => 'Welcome to the Ambiance Room, where every detail is meticulously crafted to create a captivating atmosphere. Situated within our sophisticated accommodations, this room offers a unique blend of elegance and charm. Just like the harmonious balance of light and shadow, the Ambiance Room immerses you in a world of tranquility and refinement. Relax in style as soft, ambient lighting sets the mood for relaxation and rejuvenation. Whether you are here for business or leisure, the Ambiance Room provides a serene sanctuary where you can escape the stresses of daily life and immerse yourself in luxurious comfort. Experience the perfect blend of style and serenity in the Ambiance Room, where every moment is infused with sophistication and grace.',
            'main_image_path' => 'soba14.1.jpg',
            'type_id' => 6,
        ],
        [
            'name' => 'Grand Room',
            'size' => '53',
            'description' => 'Welcome to the Grand Room, where luxury and grandeur come together to create an unparalleled experience. Nestled within our prestigious accommodations, this room offers a spacious and opulent retreat for discerning guests. Just like the majestic halls of a grand palace, the Grand Room exudes elegance and sophistication, with lavish furnishings and exquisite decor. Relax in style as soft lighting and plush fabrics create an atmosphere of refined comfort. Whether you are here for business or leisure, the Grand Room provides a luxurious sanctuary where you can unwind and rejuvenate in unparalleled luxury. Experience the grandeur and splendor of the Grand Room, where every moment is designed to leave a lasting impression.',
            'main_image_path' => 'soba15.1.jpg',
            'type_id' => 8,
        ],
        [
            'name' => 'Elite Room',
            'size' => '44',
            'description' => 'Welcome to the Elite Room, where exclusivity meets unparalleled luxury. Situated within our prestigious accommodations, this room offers a sophisticated retreat for the most discerning guests. Just like the refined elegance of a private members club, the Elite Room exudes an aura of prestige and sophistication, with exquisite design and opulent furnishings. Relax in indulgence as plush fabrics and upscale amenities envelop you in comfort and style. Whether you are here for business or leisure, the Elite Room provides a sanctuary of sophistication where you can escape the ordinary and embrace the extraordinary. Experience the epitome of luxury and refinement in the Elite Room, where every detail is meticulously curated to exceed your expectations.',
            'main_image_path' => 'soba16.1.jpg',
            'type_id' => 4,
        ],
        [
            'name' => 'Spectacular Room',
            'size' => '78',
            'description' => 'Step into the Spectacular Room, where luxury and grandeur converge to create an unforgettable experience. Nestled within our prestigious accommodations, this room offers an opulent retreat for the most discerning guests. Just like the awe-inspiring beauty of a natural wonder, the Spectacular Room captivates the senses with its stunning design and impeccable amenities. Relax in indulgence as sumptuous furnishings and elegant decor envelop you in comfort and style. Whether you are admiring panoramic views of the city skyline or reveling in the lavish details of your surroundings, the Spectacular Room promises a truly remarkable stay. Experience the epitome of luxury and sophistication in the Spectacular Room, where every moment is infused with unparalleled splendor.',
            'main_image_path' => 'soba18.1.jpg',
            'type_id' => 2,
        ],
        [
            'name' => 'Classic Room',
            'size' => '39',
            'description' => 'Welcome to the Classic Room, where timeless charm meets modern comfort. Located within our esteemed accommodations, this room offers a refined retreat for discerning travelers. Just like the enduring appeal of a classic masterpiece, the Classic Room exudes elegance and sophistication, with tasteful decor and luxurious furnishings. Relax in style as soft hues and subtle accents create a serene ambiance, inviting you to unwind and recharge. Whether you are here for business or leisure, the Classic Room provides a tranquil sanctuary where you can escape the hustle and bustle of the outside world. Experience the timeless allure and unmatched comfort of the Classic Room, where every detail is designed to exceed your expectations.',
            'main_image_path' => 'soba17.1.jpg',
            'type_id' => 7,
        ],
        [
            'name' => 'Double Room',
            'size' => '67',
            'description' => 'Step into the Double Room, where comfort and convenience intertwine to create a delightful retreat. Nestled within our welcoming accommodations, this room offers ample space and essential amenities for a relaxing stay. Just like the harmony of two souls, the Double Room provides a cozy haven where you can unwind and recharge. Relax in comfort as soft linens and plush bedding envelop you in a cocoon of relaxation, ensuring a restful nights sleep. Whether you are traveling with a companion or seeking extra space for yourself, the Double Room offers the perfect blend of comfort and functionality. Experience the warmth and tranquility of the Double Room, where every moment is designed with your comfort in mind.',
            'main_image_path' => 'soba19.1.jpg',
            'type_id' => 6,
        ],
        [
            'name' => 'Queen Room',
            'size' => '41',
            'description' => 'Welcome to the Queen Room, where understated elegance meets timeless comfort. Situated within our distinguished accommodations, this room offers a serene sanctuary for relaxation and rejuvenation. Just like the grace and poise of a queen, the Queen Room exudes an aura of refined sophistication, with tasteful decor and plush furnishings. Relax in luxury as soft hues and rich textures create a welcoming atmosphere, inviting you to unwind after a day of exploration. Whether you are traveling solo or with a companion, the Queen Room provides a cozy haven where you can escape the hustle and bustle of the outside world. Experience the regal charm and unmatched comfort of the Queen Room, where every moment is fit for royalty.',
            'main_image_path' => 'soba20.1.jpg',
            'type_id' => 5,
        ],
        [
            'name' => 'Urban Room',
            'size' => '53',
            'description' => 'Step into the Urban Room, where modern sophistication meets urban allure. Located in the heart of our chic accommodations, this room offers a stylish retreat amidst the bustling cityscape. Just like navigating the vibrant streets of a cosmopolitan metropolis, the Urban Room immerses you in the pulse of city life, with sleek design and contemporary comforts. Relax in comfort as the dynamic energy of the city flows outside your window, creating a backdrop of endless excitement. Whether you are here for business or leisure, the Urban Room provides a chic sanctuary where you can recharge and rejuvenate in style. Experience the rhythm of urban living and discover the essence of modern elegance in the Urban Room.',
            'main_image_path' => 'soba21.1.jpg',
            'type_id' => 8,
        ],
        [
            'name' => 'Vista Room',
            'size' => '29',
            'description' => '
            Enter the Vista Room and be greeted by an expansive panorama of breathtaking views Situated in the heart of our luxurious accommodations, this room offers a captivating blend of comfort and spectacle. Just like gazing out over a picturesque vista, the VistaRoom provides an awe-inspiring experience that captivates the senses. Relax in style as natural light floods the space, illuminating every corner with warmth and tranquility. Whether you are admiring city skylines, mountain peaks, or ocean horizons, the Vista Room offers an unparalleled vantage point for embracing the beauty of the world around you. Immerse yourself in a world of endless possibilities and create memories that will last a lifetime in the Vista Room.',
            'main_image_path' => 'soba22.1.jpg',
            'type_id' => 7,
        ],
        [
            'name' => 'Garden Room',
            'size' => '62',
            'description' => 'Step into the enchanting Garden Room, where natures beauty flourishes both indoors and out. Designed to immerse guests in the serenity of a lush botanical oasis, this room offers a tranquil escape from the urban bustle. Just like strolling through a vibrant garden, the Garden Room invites you to unwind amidst verdant foliage and fragrant blooms. Relax on your private patio or balcony, surrounded by the soothing sounds of birdsong and rustling leaves. Whether you are savoring a morning coffee amidst the verdant greenery or enjoying a twilight glass of wine under the stars, the Garden Room provides a peaceful retreat for reconnecting with the rhythms of nature.',
            'main_image_path' => 'soba23.1.jpg',
            'type_id' => 4,
        ],
        [
            'name' => 'Sunset Room',
            'size' => '22',
            'description' => 'Experience the breathtaking beauty of the Sunset Room, where every evening paints a masterpiece across the sky. Nestled within our luxurious accommodations, this room offers a serene retreat from the hustle and bustle of daily life. Just like the mesmerizing allure of a sunset, the Sunset Room provides a tranquil escape, inviting guests to unwind and immerse themselves in natural beauty. Relax in comfort as warm hues dance across the horizon, casting a soft glow throughout the room. Whether you are seeking a romantic getaway or simply a moment of peace and reflection, the Sunset Room offers the perfect setting for creating cherished memories that last a lifetime.',
            'main_image_path' => 'soba24.1.jpg',
            'type_id' => 6,
        ],
    ];
    public function run(): void
    {
        foreach ($this->rooms as $room) {
            DB::table("rooms")->insert($room);
        }
    }
}
