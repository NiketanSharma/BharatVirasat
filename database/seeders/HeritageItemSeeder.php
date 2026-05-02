<?php

namespace Database\Seeders;

use App\Models\HeritageItem;
use Illuminate\Database\Seeder;

class HeritageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Kathak',
                'category' => 'dance',
                'state' => 'Uttar Pradesh',
                'short_desc' => 'One of the eight major forms of Indian classical dance, originating from the nomadic bards of ancient northern India.',
                'long_desc' => "Kathak is one of the most captivating classical dance forms of India, tracing its origins to the nomadic bards of ancient North India, known as Kathakars or storytellers. The word 'Kathak' is derived from the Sanskrit word 'Katha' meaning story. These storytellers communicated stories from the great epics and ancient mythology through dance, songs, and music.\n\nOver centuries, Kathak evolved significantly, absorbing influences from both Hindu and Muslim cultures. During the Bhakti movement, it was performed in temples as a devotional practice, depicting tales of Lord Krishna and Radha. Later, under the Mughal era, the dance form moved to the royal courts, where it acquired a more sophisticated, secular character with elaborate footwork and spins (chakkars).\n\nKathak is distinguished by its intricate footwork adorned with ankle bells (ghungroos), fast spins, and expressive gestures. The dance seamlessly blends elements of Hindu and Muslim artistic traditions, making it unique among Indian classical dance forms. Today, three major gharanas (schools) of Kathak — Lucknow, Jaipur, and Banaras — continue to flourish, each with its own distinctive style and emphasis.",
                'status' => 'approved',
            ],
            [
                'name' => 'Diwali',
                'category' => 'festival',
                'state' => 'Pan India',
                'short_desc' => 'The Festival of Lights, one of the most significant Hindu festivals celebrated across the entire subcontinent.',
                'long_desc' => "Diwali, or Deepavali, literally meaning 'a row of lights,' is one of the most cherished and widely celebrated festivals in India. This five-day festival of lights symbolizes the spiritual victory of light over darkness, good over evil, and knowledge over ignorance.\n\nThe festival is rooted in several mythological narratives. In North India, it celebrates Lord Rama's return to Ayodhya after 14 years of exile and his victory over the demon king Ravana. In South India, it marks Lord Krishna's defeat of the demon Narakasura. In Bengal, the festival is dedicated to Goddess Kali. Jains celebrate it as the day Lord Mahavira attained moksha.\n\nDuring Diwali, homes are cleaned and decorated with rangoli (colorful floor patterns), diyas (oil lamps), and candles. Families gather for puja (prayer ceremonies), particularly to Goddess Lakshmi, the deity of wealth and prosperity. The night sky lights up with fireworks, and people exchange gifts, sweets, and warm wishes. Markets bustle with shoppers buying new clothes, jewelry, and decorative items.\n\nDiwali also marks the beginning of the new financial year for many Indian businesses, symbolizing new beginnings and the hope for prosperity in the coming year.",
                'status' => 'approved',
            ],
            [
                'name' => 'Madhubani Painting',
                'category' => 'art',
                'state' => 'Bihar',
                'short_desc' => 'A traditional art form from the Mithila region of Bihar, known for its vibrant geometric patterns and mythological themes.',
                'long_desc' => "Madhubani painting, also known as Mithila painting, is a style of Indian painting practiced in the Mithila region of Bihar. This ancient art form has been passed down through generations, traditionally by women, who painted the walls and floors of their homes during festivals, religious events, and special occasions like weddings.\n\nThe name 'Madhubani' literally translates to 'forests of honey,' referring to the town in Bihar where this art form flourished. The paintings are characterized by their eye-catching geometrical patterns, vibrant use of color, and depiction of nature and Hindu mythological scenes.\n\nTraditionally, Madhubani paintings use natural dyes and pigments extracted from plants. The colors are derived from turmeric (yellow), indigo (blue), flowers (red), leaves (green), and lamp soot (black). The paintings are done using fingers, twigs, brushes, nib-pens, and matchsticks, on handmade paper, canvas, or cloth.\n\nThe art form encompasses five distinctive styles: Bharni, Katchni, Tantrik, Godna, and Kohbar. Each style has its own unique characteristics — Bharni uses filled, colorful patterns; Katchni employs fine line work; Tantrik features religious themes; Godna mirrors tattoo designs of the lower castes; and Kohbar depicts wedding scenes.\n\nIn 2003, Madhubani painting received a Geographical Indication (GI) tag, recognizing it as a unique cultural product of the Mithila region.",
                'status' => 'approved',
            ],
            [
                'name' => 'Biryani',
                'category' => 'cuisine',
                'state' => 'Telangana',
                'short_desc' => 'A rich, aromatic rice dish layered with spiced meat, saffron, and herbs — a crown jewel of Hyderabadi cuisine.',
                'long_desc' => "Biryani is one of India's most celebrated culinary masterpieces, with the Hyderabadi version being among the most famous worldwide. This aromatic dish of layered rice and meat is a perfect testament to the rich culinary heritage that evolved in the royal kitchens of the Nizams of Hyderabad.\n\nHyderabadi Biryani is believed to have originated when Mughal emperor Aurangzeb's son, Nizam-ul-Mulk, established the Asaf Jahi dynasty in Hyderabad in 1724. The royal chefs blended Mughlai cooking techniques with the local Andhra cuisine, creating a distinctive style that set Hyderabadi Biryani apart.\n\nThe dish follows the 'dum' method of cooking — raw marinated meat and partially cooked basmati rice are layered in a heavy-bottomed pot (handi), sealed with dough, and slow-cooked over a low flame. This technique allows the flavors to meld beautifully while the steam cooks everything to perfection.\n\nKey ingredients include premium basmati rice, tender meat (traditionally goat), yogurt, fried onions, saffron, mint, coriander, and a carefully balanced blend of spices including cardamom, cinnamon, bay leaves, and star anise. The result is a dish where every grain of rice is infused with aromatic flavors.\n\nBiryani is not just food in Hyderabad — it's an emotion, a cultural identity, and a source of immense pride for the city's residents.",
                'status' => 'approved',
            ],
            [
                'name' => 'Taj Mahal',
                'category' => 'monument',
                'state' => 'Uttar Pradesh',
                'short_desc' => 'An ivory-white marble mausoleum and UNESCO World Heritage Site, regarded as the finest example of Mughal architecture.',
                'long_desc' => "The Taj Mahal, standing majestically on the banks of the Yamuna River in Agra, is widely considered one of the most beautiful buildings ever created. This magnificent mausoleum was commissioned in 1632 by Mughal Emperor Shah Jahan to house the tomb of his beloved wife, Mumtaz Mahal, who died during childbirth.\n\nThe construction of the Taj Mahal took approximately 22 years, employing over 20,000 artisans and craftsmen from across India, Persia, the Ottoman Empire, and Europe. The chief architect is believed to be Ustad Ahmad Lahouri, who masterfully blended elements from Islamic, Persian, Ottoman Turkish, and Indian architectural styles.\n\nThe main structure is built from luminous white marble sourced from Rajasthan, inlaid with semi-precious stones including jasper, jade, turquoise, lapis lazuli, sapphire, and carnelian in intricate floral and calligraphic patterns — a technique known as 'pietra dura.' The marble appears to change color depending on the time of day and the moonlight, giving it an almost ethereal quality.\n\nThe complex spans 17 hectares and includes a mosque, a guest house, formal gardens divided into four parts by waterways (representing the four rivers of Paradise in Islamic tradition), and the iconic reflecting pool. The main dome rises to 73 meters, surrounded by four minarets that lean slightly outward — a deliberate design to protect the tomb in case of collapse.\n\nDesignated as a UNESCO World Heritage Site in 1983, the Taj Mahal was also named one of the New Seven Wonders of the World in 2007. It attracts 7-8 million visitors annually and remains India's most iconic symbol of love and architectural excellence.",
                'status' => 'approved',
            ],
            [
                'name' => 'Baul Music',
                'category' => 'music',
                'state' => 'West Bengal',
                'short_desc' => 'A mystical folk music tradition of Bengal, performed by wandering minstrels known as Bauls who seek divine truth through song.',
                'long_desc' => "Baul music is a unique and mystical form of folk music that originated in Bengal, encompassing parts of present-day West Bengal in India and Bangladesh. The Bauls are a group of wandering minstrels who have rejected organized religion and caste distinctions, instead seeking spiritual truth through music, dance, and an unconventional lifestyle.\n\nThe word 'Baul' is believed to derive from the Sanskrit 'vatula' meaning 'enlightened' or 'mad' — aptly describing these free-spirited musicians who are considered 'mad about God.' Their philosophy draws from various traditions including Vaishnavism, Sufism, Buddhism, and Tantra, creating a syncretic spiritual path that transcends religious boundaries.\n\nBaul songs, known as 'Baul Gaan,' are deeply philosophical compositions that explore themes of divine love, the human body as a temple, the search for the 'Moner Manush' (Man of the Heart), and the rejection of social norms. The lyrics are rich with metaphors, allegories, and mystical imagery.\n\nThe music is typically accompanied by a one-stringed instrument called the ektara, along with the dotara (a type of lute), duggi (small drum), and khamak (a plucked drum). The Bauls often perform with a distinctive singing and dancing style, wearing saffron or patchwork robes, symbolizing their renunciation of material attachment.\n\nRabindranath Tagore, India's Nobel laureate poet, was deeply influenced by Baul philosophy and music, incorporating their themes into many of his own compositions. In 2005, UNESCO proclaimed the Baul tradition as a 'Masterpiece of the Oral and Intangible Heritage of Humanity,' recognizing its unique cultural significance.",
                'status' => 'approved',
            ],
            [
                'name' => 'Bharatanatyam',
                'category' => 'dance',
                'state' => 'Tamil Nadu',
                'short_desc' => 'One of the oldest and most revered classical dance forms of India, originating from the temples of Tamil Nadu.',
                'long_desc' => "Bharatanatyam is one of the oldest and most widely practiced classical dance forms of India, with roots going back over 2,000 years to the temples of Tamil Nadu. The name is derived from 'Bharata' (combining Bhava — expression, Raga — melody, and Tala — rhythm) and 'Natyam' (dance).\n\nThis dance form was originally performed by Devadasis (temple dancers) as a form of worship in Hindu temples. It was codified and documented in the ancient treatise 'Natya Shastra' by sage Bharata Muni, which is considered the foundational text of Indian performing arts.\n\nBharatanatyam is characterized by its fixed upper torso, bent legs, and spectacular footwork, combined with a sophisticated vocabulary of hand gestures (mudras), facial expressions, and body movements. The dancer's feet are adorned with ankle bells (salangai), and the rhythmic patterns created are integral to the performance.\n\nA traditional Bharatanatyam recital follows a specific sequence called 'margam' — starting with Alarippu (invocation), followed by Jatiswaram (pure dance), Shabdam (expressive piece), Varnam (the centerpiece combining pure dance and expression), Padam (lyrical compositions), Tillana (energetic finale), and Mangalam (concluding prayer).\n\nIn the early 20th century, pioneers like Rukmini Devi Arundale and Balasaraswati played crucial roles in reviving and bringing Bharatanatyam from temples to concert stages, establishing it as a respected art form worldwide.",
                'status' => 'approved',
            ],
            [
                'name' => 'Holi',
                'category' => 'festival',
                'state' => 'Pan India',
                'short_desc' => 'The Festival of Colors, celebrating the triumph of good over evil and the arrival of spring across India.',
                'long_desc' => "Holi, known as the Festival of Colors, is one of India's most vibrant and joyous celebrations. Observed primarily in March, this ancient Hindu festival heralds the arrival of spring and celebrates the triumph of good over evil.\n\nThe festival has its origins in several Hindu legends. The most popular is the story of Prahlad and Holika — where the demon king Hiranyakashipu's sister Holika tried to kill the devout prince Prahlad by sitting with him in a fire, but divine intervention saved Prahlad while Holika perished. This event is commemorated the night before Holi with 'Holika Dahan' — the burning of bonfires.\n\nThe main day of Holi transforms India into a riot of colors. People of all ages take to the streets, smearing each other with colored powders (gulal) and drenching each other with colored water using water guns (pichkaris) and water balloons. Traditional celebrations also include drinking 'thandai' (a spiced milk drink sometimes infused with bhang), eating special sweets like 'gujiya,' and singing and dancing to the beats of dhol drums.\n\nOne of the most famous celebrations occurs in Mathura and Vrindavan, the legendary birthplace and playground of Lord Krishna. The 'Lathmar Holi' in Barsana, where women playfully beat men with sticks, and the flower Holi at the Banke Bihari temple are spectacular events that draw visitors from around the world.\n\nHoli is unique in its ability to dissolve social barriers — during the festival, distinctions of age, gender, caste, and class are momentarily forgotten as everyone joins in the colorful celebration.",
                'status' => 'approved',
            ],
            [
                'name' => 'Pattachitra',
                'category' => 'art',
                'state' => 'Odisha',
                'short_desc' => 'An ancient scroll painting tradition from Odisha, featuring intricate mythological narratives with rich colors and fine details.',
                'long_desc' => "Pattachitra is a traditional painting art form that has flourished in the eastern Indian state of Odisha for over a thousand years. The name is derived from the Sanskrit words 'patta' (cloth) and 'chitra' (picture), literally meaning 'cloth painting.'\n\nThis ancient art form is closely linked to the worship of Lord Jagannath at the famous Puri temple. The artists, known as 'chitrakars,' traditionally belonged to the village of Raghurajpur near Puri, which remains the primary center of Pattachitra art to this day.\n\nThe creation of a Pattachitra is a meticulous process that begins with preparing the canvas. Cotton cloth is coated with a mixture of chalk and tamarind seed gum to create a smooth, durable surface. The artists then draw intricate designs using fine brushes made from animal hair and natural colors derived from minerals, plants, and other organic sources.\n\nThe paintings are characterized by bold, detailed outlines; vivid, natural colors (red from hingula, white from conch shells, yellow from haritala, black from lamp soot); elaborate floral borders; and the distinctive large, round eyes of the figures. Common themes include depictions of Lord Jagannath, scenes from the Ramayana and Mahabharata, Krishna Leela, and the Dashavatara (ten incarnations of Lord Vishnu).\n\nPattachitra has received international recognition and a GI tag, ensuring the protection of this unique art form. The artists of Raghurajpur continue to preserve this tradition, with the village itself becoming a living heritage site.",
                'status' => 'approved',
            ],
            [
                'name' => 'Rogan Art',
                'category' => 'art',
                'state' => 'Gujarat',
                'short_desc' => 'A rare and dying art form of cloth painting using castor oil-based paints, practiced by only one family in Kutch, Gujarat.',
                'long_desc' => "Rogan art is an extraordinarily rare form of textile painting that has survived for over four centuries in the Kutch district of Gujarat. The word 'Rogan' comes from Persian, meaning 'oil-based,' referring to the unique paint medium used in this art form.\n\nThe technique involves creating a thick, colorful paste by heating castor oil and mixing it with natural pigments. This paint is then applied to fabric using a metal stylus (kalam) — but here's what makes Rogan art truly remarkable: the artist never touches the brush to the fabric. Instead, the paint is twisted and stretched between the fingers and the stylus, creating fine threads of color that are laid onto the fabric with extraordinary precision.\n\nThe designs are predominantly symmetrical. The artist paints one half of the design, then folds the fabric to transfer the mirror image to the other side, creating perfectly balanced patterns. Common motifs include the tree of life, floral patterns, geometric designs, and peacocks.\n\nToday, the Khatri family of Nirona village in Kutch is the sole practitioner of this art. Abdul Gafur Khatri, who received the National Award for his work, has been instrumental in keeping this tradition alive. His family members continue to practice and teach the art, but the extreme difficulty of the technique and the small number of practitioners make Rogan art one of India's most endangered crafts.\n\nWhen Prime Minister Narendra Modi gifted a Rogan art piece to US President Barack Obama in 2014, it brought international attention to this dying art form.",
                'status' => 'approved',
            ],
            [
                'name' => 'Qawwali',
                'category' => 'music',
                'state' => 'Delhi',
                'short_desc' => 'A powerful form of Sufi devotional music originating from the Indian subcontinent, meant to induce spiritual ecstasy.',
                'long_desc' => "Qawwali is a vibrant and powerful form of Sufi devotional music that has been an integral part of India's musical heritage for over 700 years. Rooted in the Sufi tradition of Islam, Qawwali aims to lead listeners to a state of spiritual ecstasy and divine connection.\n\nThe art form was formalized by Amir Khusrau, the legendary 13th-century poet, musician, and scholar who served in the court of the Delhi Sultanate. Khusrau fused Persian and Turkish musical elements with Indian ragas and talas, creating a distinctive form that would become the vehicle for Sufi spiritual expression.\n\nA Qawwali performance is led by a lead singer (the Qawwal), accompanied by a group of supporting vocalists and musicians. Traditional instruments include the harmonium, tabla, dholak, and the rhythmic clapping of the accompanying singers. The performance typically builds gradually in intensity, with repetitive phrases and increasing tempo designed to create a hypnotic, trance-like atmosphere.\n\nThe lyrics draw from Persian, Urdu, Hindi, and Punjabi, with themes centered on divine love, praise of the Prophet, and devotion to Sufi saints. The most famous venue for Qawwali in India is the Nizamuddin Dargah in Delhi, where weekly performances have taken place for centuries at the shrine of the Sufi saint Hazrat Nizamuddin Auliya.\n\nThe legendary Nusrat Fateh Ali Khan brought Qawwali to the global stage in the late 20th century, while artists like the Sabri Brothers, Abida Parveen, and the Nizami Bandhu continue to keep this tradition alive.",
                'status' => 'approved',
            ],
            [
                'name' => 'Konark Sun Temple',
                'category' => 'monument',
                'state' => 'Odisha',
                'short_desc' => 'A 13th-century UNESCO World Heritage Site in Odisha, designed as a colossal chariot of the Sun God with intricate stone carvings.',
                'long_desc' => "The Konark Sun Temple, located on the eastern coast of Odisha near the town of Puri, is one of India's most magnificent architectural achievements. Built in the 13th century by King Narasimhadeva I of the Eastern Ganga dynasty, this temple is dedicated to Surya, the Hindu Sun God.\n\nThe temple is designed in the form of a gigantic chariot with 24 elaborately carved stone wheels (each about 3 meters in diameter), pulled by seven spirited horses. The wheels are not merely decorative — they function as sundials, and the shadows cast by their spokes can accurately tell the time of day to the minute.\n\nThe temple complex originally consisted of the main sanctum (deul), which rose to approximately 70 meters (now in ruins), the audience hall (jagamohana) which still stands at about 40 meters, the dance hall (nata mandira), and the dining hall (bhoga mandapa). The entire structure is built from Khondalite stone, which takes on different hues throughout the day.\n\nThe walls of the temple are covered with intricate carvings depicting every aspect of life — from celestial beings, mythological narratives, and royal processions to everyday scenes, animals, and erotic sculptures. These carvings are considered masterpieces of medieval Indian art and provide valuable insights into the social, cultural, and religious life of 13th-century Odisha.\n\nDesignated as a UNESCO World Heritage Site in 1984, the Konark Sun Temple is often referred to as the 'Black Pagoda' by European sailors who used it as a navigational landmark. It remains one of India's most visited heritage sites and a testament to the extraordinary engineering and artistic capabilities of ancient Indian civilization.",
                'status' => 'approved',
            ],
        ];

        foreach ($items as $item) {
            HeritageItem::create($item);
        }
    }
}
