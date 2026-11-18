<?php
/**
 * ============================================================================
 *  RG FITNESS — SITE CONFIG
 *  Every piece of business data lives here. Edit this file, refresh the page.
 *  Items tagged [CONFIRM] were supplied as unconfirmed — verify before launch.
 * ============================================================================
 */

return [

    /* ── Brand / site ───────────────────────────────────────────────────── */
    'name'        => 'RG Fitness',
    'city'        => 'Jamshedpur, Jharkhand',
    'tagline'     => 'Premium fitness. Expert guidance. Real results.',
    'site_url'    => 'https://www.rgfitness.in',   // [CONFIRM] live domain, no trailing slash. Used for canonical/OG/sitemap.
    'year'        => '2026',

    /* ── Which sections to show (in page order) ─────────────────────────────
     *  Remove a name to hide that section (nav links adapt automatically).
     */
    'sections'    => ['hero','marquee','stats','programs','facilities','why','membership',
                      'trainers','testimonials','branches','trial','instagram','faq'],

    /* ── Contact ────────────────────────────────────────────────────────── */
    'phone_display' => '+91 62038 08227',
    'phone_tel'     => '+916203808227',   // used in tel: links
    'whatsapp'      => '916203808227',    // used in wa.me links (digits only)
    'instagram_url' => 'https://www.instagram.com/rgfitness_jsr/',
    'instagram'     => '@rgfitness_jsr',

    /* ── Social proof ───────────────────────────────────────────────────── */
    // Google: 5.0 from ~246 reviews (approx.). Justdial: 5.0 from 260+ ratings. [CONFIRM] counts before launch; update as they grow.
    'rating'        => '5.0',
    'rating_count'  => '246+',          // Google review count, shown in the hero badge
    'rating_source' => 'Google',
    'justdial_count'=> '260+',
    'listed_on'     => 'FITPASS',

    /* ── Branches ───────────────────────────────────────────────────────── */
    // Geo coordinates are approximate [CONFIRM] — right-click your pin in Google Maps to copy exact values.
    'branches' => [
        'kadma' => [
            'id'       => 'kadma',
            'short'    => 'Kadma',
            'title'    => 'Kadma / Shastri Nagar',
            'lines'    => ['3rd Floor, Mittal Plaza, Shastrinagar,', 'Main Road, Block 4, Kadma,', 'Jamshedpur – 831005'],
            'street'   => '3rd Floor, Mittal Plaza, Shastrinagar, Main Road, Block 4, Kadma',
            'postal'   => '831005',
            'timings'  => '6:00 AM – 10:30 PM',
            'opens'    => '06:00',
            'closes'   => '22:30',
            'lat'      => 22.7894,
            'lng'      => 86.1727,
            'map_q'    => 'RG Fitness, Mittal Plaza, Shastrinagar, Kadma, Jamshedpur 831005',
        ],
        'sonari' => [
            'id'       => 'sonari',
            'short'    => 'Sonari',
            'title'    => 'Sonari',
            'lines'    => ['1st–2nd Floor, A Road,', 'East West Link Road, Kagalnagar,', 'Sonari, Jamshedpur'],
            'street'   => '1st–2nd Floor, A Road, East West Link Road, Kagalnagar, Sonari',
            'postal'   => '831011',            // [CONFIRM]
            'timings'  => '6:00 AM – 10:00 PM',
            'opens'    => '06:00',
            'closes'   => '22:00',
            'lat'      => 22.8117,
            'lng'      => 86.1634,
            'map_q'    => 'RG Fitness, A Road, East West Link Road, Kagalnagar, Sonari, Jamshedpur',
        ],
    ],
    'open_days' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'], // [CONFIRM] days open

    /* ── Team [CONFIRM] ─────────────────────────────────────────────────── */
    // SWAP the photo keys for real portraits (see 'images' below).
    'team' => [
        ['name' => 'Shiv Verma',      'role' => 'Head Trainer',  'focus' => 'Strength · Hypertrophy · Transformation', 'img' => 't1', 'ig' => 'https://www.instagram.com/rgfitness_jsr/'],
        ['name' => 'Mithilesh Gupta', 'role' => 'Gym Manager',   'focus' => 'Member Experience · Programming',       'img' => 't2', 'ig' => 'https://www.instagram.com/rgfitness_jsr/'],
        ['name' => 'Ratnesh Gupta',   'role' => 'Founder & Owner','focus' => 'Vision · Standards · Community',       'img' => 't3', 'ig' => 'https://www.instagram.com/rgfitness_jsr/'],
        ['name' => 'Coach Name',      'role' => 'Group Fitness', 'focus' => 'Zumba · CrossFit · Conditioning',        'img' => 't4', 'ig' => 'https://www.instagram.com/rgfitness_jsr/'], // PLACEHOLDER — add your real coach
    ],

    /* ── Membership [CONFIRM all prices] ────────────────────────────────── */
    'plans' => [
        ['name' => '1 Month',  'months' => 1,  'price' => 1500,  'featured' => false],
        ['name' => '3 Months', 'months' => 3,  'price' => 3000,  'featured' => false],
        ['name' => '6 Months', 'months' => 6,  'price' => 5400,  'featured' => false],
        ['name' => '12 Months','months' => 12, 'price' => 10000, 'featured' => true],
    ],
    'plan_features' => [ // [CONFIRM] what each plan includes
        'Full strength & cardio floor access',
        'Air-conditioned training floor',
        'Sauna access',
        'Trainer guidance on the floor',
    ],
    // Add-ons shown under the plans. 'price' => null renders "Ask for rates". [CONFIRM]
    // Couple packages are mentioned in public member reviews; set a real price when you have one.
    'addons' => [
        ['name' => 'Personal Trainer', 'price' => 3000, 'per' => 'month', 'blurb' => 'One-to-one coaching built around your goal.', 'cta' => 'Add Personal Training'],
        ['name' => 'Couple Membership', 'price' => null, 'per' => '',     'blurb' => 'Train together, stay accountable. Special package for two.', 'cta' => 'Ask About Couple Plans'],
    ],

    /* ── Marquee ────────────────────────────────────────────────────────── */
    'marquee' => ['Strength','Cardio','CrossFit','Zumba','Sauna','Personal Training','Transformation'],

    /* ── Stats band (value, decimals, suffix, label) ────────────────────── */
    'stats' => [
        ['value' => 2,   'dec' => 0, 'suffix' => '',  'label' => 'Branches in Jamshedpur'],
        ['value' => 5.0, 'dec' => 1, 'suffix' => '★', 'label' => 'Google & Justdial rating'],
        ['value' => 246, 'dec' => 0, 'suffix' => '+', 'label' => 'Google reviews'],
        ['value' => 16,  'dec' => 0, 'suffix' => '+', 'label' => 'Hours open, daily'],
    ],

    /* ── Programs ───────────────────────────────────────────────────────── */
    // 'goal' must match an option in the lead form (see 'goals').
    'programs' => [
        ['title' => 'Strength Training',        'img' => 'deadlift',  'goal' => 'Muscle gain',
         'desc'  => 'Racks, plates and platforms built for heavy, honest lifting. Get stronger every single week.'],
        ['title' => 'Cardio',                   'img' => 'cardio',    'goal' => 'General fitness',
         'desc'  => 'Studio-grade bikes, treadmills and cross-trainers on an air-conditioned floor.'],
        ['title' => 'CrossFit',                 'img' => 'rack',      'goal' => 'CrossFit',
         'desc'  => 'High-intensity, coached conditioning. Scalable for every level, brutal for everyone.'],
        ['title' => 'Zumba',                    'img' => 'zumba',     'goal' => 'Zumba',
         'desc'  => 'Dance-driven cardio with serious energy. Burn big, smile bigger.'],
        ['title' => 'Personal Training',        'img' => 'training',  'goal' => 'Muscle gain',
         'desc'  => 'One coach. One plan. Programming, form and accountability built around you.'],
        ['title' => 'Weight Loss & Transformation', 'img' => 'dumbbells', 'goal' => 'Weight loss',
         'desc'  => 'Structured training and coaching to take you from where you are to where you want to be.'],
    ],

    /* ── Why RG Fitness ─────────────────────────────────────────────────── */
    'why' => [
        // Themes taken from public member reviews: knowledgeable trainers, modern equipment, clean & spacious, supportive, value.
        ['t' => 'Expert coaching',       'd' => 'Knowledgeable trainers who correct your form, explain the why and keep you progressing.'],
        ['t' => 'Modern equipment',      'd' => 'Quality machines, a full free-weights zone and room to move, never a queue for the basics.'],
        ['t' => 'Clean, spacious, supportive', 'd' => 'A bright, well-kept floor and a community that motivates beginners and regulars alike.'],
        ['t' => 'Honest value, two locations', 'd' => 'Premium training without the luxury price tag. Plans from ₹833 a month in Kadma and Sonari.'],
    ],

    /* ── Lead form options ──────────────────────────────────────────────── */
    'goals' => ['Weight loss','Muscle gain','General fitness','CrossFit','Zumba'],
    'times' => ['Early morning (6–9 AM)','Late morning (9 AM–12 PM)','Afternoon (12–4 PM)','Evening (4–8 PM)','Night (8–10 PM)'],

    /* ── Testimonials — SAMPLE CONTENT. Replace with real reviews. ──────── */
    // A card with 'combo' uses ONE real before/after image. Add the member's real name + quote (with consent).
    'testimonials' => [
        ['name' => 'Member Name', 'detail' => 'Transformation · add duration', 'stars' => 5, 'combo' => 'transform1',
         'quote' => 'Add this member\'s own words about their transformation and the coaching they received at RG Fitness.'],
        ['name' => 'Member Name', 'detail' => 'Weight loss · 6 months', 'stars' => 5, 'before' => 'floor',    'after' => 'dumbbells',
         'quote' => 'Sample review: swap this for a real member quote about their transformation and the coaching they received.'],
        ['name' => 'Member Name', 'detail' => 'Muscle gain · 12 months','stars' => 5, 'before' => 'lockers',  'after' => 'deadlift',
         'quote' => 'Sample review: swap this for a real member quote about the equipment, the trainers and the results.'],
        ['name' => 'Member Name', 'detail' => 'General fitness · 3 months','stars' => 5,'before' => 'training', 'after' => 'rack',
         'quote' => 'Sample review: swap this for a real member quote about the atmosphere and consistency.'],
        ['name' => 'Member Name', 'detail' => 'CrossFit · 6 months',    'stars' => 5, 'before' => 'cardio',   'after' => 'floor',
         'quote' => 'Sample review: swap this for a real member quote. Pull genuine ones from Justdial or Google.'],
    ],

    /* ── FAQ [CONFIRM answers marked] ───────────────────────────────────── */
    'faq' => [
        ['q' => 'What are your timings?',
         'a' => 'Kadma is open 6:00 AM – 10:30 PM. Sonari is open 6:00 AM – 10:00 PM.'],
        ['q' => 'Do you offer a free trial?',
         'a' => 'Yes. Book a free trial session through the form on this page or message us on WhatsApp and we will confirm a slot at your preferred branch.'],
        ['q' => 'Is RG Fitness a female-friendly environment?',
         'a' => 'Absolutely. Both branches are clean, well-lit and respectful, with trainers who make every member feel welcome. Women train here every day.'], // [CONFIRM]
        ['q' => 'Is parking available?',
         'a' => 'Parking is available near both branches. Message us on WhatsApp for the easiest approach to your preferred location.'], // [CONFIRM]
        ['q' => 'Do you have couple memberships?',
         'a' => 'Yes, couple packages are available. Message us on WhatsApp for current rates and we will set you both up.'], // [CONFIRM]
        ['q' => 'Do you offer personal training?',
         'a' => 'Yes. One-to-one personal training is available as an add-on at ₹3,000 per month, with a plan built around your goal.'],
        ['q' => 'Do you accept FITPASS?',
         'a' => 'RG Fitness is listed on FITPASS. Check your pass details or message us to confirm access at your preferred branch.'], // [CONFIRM]
        ['q' => 'What payment options do you accept?',
         'a' => 'UPI, cards and cash are accepted at the front desk.'], // [CONFIRM]
    ],

    /* ── Hero ───────────────────────────────────────────────────────────── */
    // Optional looping background video (muted). Leave blank to use the image only.
    // e.g. 'assets/video/hero.mp4' (keep it under ~4 MB, 720p, no audio).
    'hero_video' => '',

    /* ── Images ─────────────────────────────────────────────────────────────
     *  HOW IT WORKS: for each key, the site first looks for the local file in
     *  /assets/img/gym/ (a .webp twin is preferred if present). If the file is
     *  missing, it falls back to the Unsplash placeholder ID.
     *
     *  >>> DROP YOUR REAL RG FITNESS PHOTOS INTO /assets/img/gym/ USING THE
     *  >>> 'file' NAMES BELOW AND THEY REPLACE THE PLACEHOLDERS AUTOMATICALLY.
     * ---------------------------------------------------------------------- */
    'images' => [
        // — Your real photos —
        // Real RG Fitness photos live in /assets/rg_gym/ (see IMG_DIR in includes/helpers.php).
        'cardio'    => ['file' => 'gym_space1.webp',  'w' => 680, 'h' => 510, 'u' => '1571019613454-1cb2f99b2d8b', 'alt' => 'Row of studio cycling bikes and a turf lane on the air-conditioned floor at RG Fitness'],
        'floor'     => ['file' => 'working.webp',     'w' => 680, 'h' => 383, 'u' => '1540497077202-7c8a3999166f', 'alt' => 'Members training on the RG Fitness floor with turf lane and strength machines'],
        'lockers'   => ['file' => 'gym_space.webp',   'w' => 382, 'h' => 510, 'u' => '1558611848-73f7eb4001a1',      'alt' => 'Turf lane, machines and member lockers at RG Fitness'],
        'deadlift'  => ['file' => 'gym.webp',         'w' => 382, 'h' => 510, 'u' => '1574680096145-d05b474e2155', 'alt' => 'Member performing a heavy deadlift on a lifting platform at RG Fitness'],
        'dumbbells' => ['file' => 'machines.webp',    'w' => 382, 'h' => 510, 'u' => '1583454110551-21f2fa2afe61', 'alt' => 'Full rack of dumbbells in the free-weights zone at RG Fitness'],
        'rack'      => ['file' => 'equipment.webp',   'w' => 680, 'h' => 510, 'u' => '1581009146145-b5ef050c2e1e', 'alt' => 'Barbell rack loaded with bumper plates on rubber flooring at RG Fitness'],
        'training'  => ['file' => 'rg-fitness.webp',  'w' => 680, 'h' => 383, 'u' => '1549576490-b0b4831ef60a',      'alt' => 'Trainer coaching members on the turf at RG Fitness'],
        // — REAL member transformation (single image with BEFORE/AFTER labels baked in) —
        'transform1' => ['file' => 'before and after.png', 'w' => 601, 'h' => 609, 'u' => '1534438327276-14e5300c3a48', 'alt' => 'Member transformation: before and after training at RG Fitness'],
        // — HERO: the earlier stock hero image (no local file, so it uses Unsplash).
        //   To use your own, add assets/rg_gym/hero.webp (1920px wide) and set 'file' => 'hero.webp'.
        'hero'      => ['file' => 'hero.webp',        'w' => 1600, 'h' => 1067, 'u' => '1571019613454-1cb2f99b2d8b', 'alt' => 'Athlete training on a mat in a bright gym'],
        // — Placeholders only (no real photo yet): replace by adding the file —
        'zumba'     => ['file' => 'zumba.jpg',          'w' => 800, 'h' => 1000, 'u' => '1518611012118-696072aa579a', 'alt' => 'Group fitness class training together on mats'],
        't1'        => ['file' => 'trainer-1.jpg',      'w' => 800, 'h' => 1000, 'u' => '1530822847156-5df684ec5ee1', 'alt' => 'Portrait of trainer Shiv Verma'],
        't2'        => ['file' => 'trainer-2.jpg',      'w' => 800, 'h' => 1000, 'u' => '1550345332-09e3ac987658',      'alt' => 'Portrait of Mithilesh Gupta, gym manager'],
        't3'        => ['file' => 'trainer-3.jpg',      'w' => 800, 'h' => 1000, 'u' => '1571731956672-f2b94d7dd0cb', 'alt' => 'Portrait of Ratnesh Gupta, founder'],
        't4'        => ['file' => 'trainer-4.jpg',      'w' => 800, 'h' => 1000, 'u' => '1600881333168-2ef49b341f30', 'alt' => 'Portrait of group fitness coach'],
    ],
    'hero_image' => 'hero',     // image key used for the hero + social share image
    'logo_file'  => 'assets/rg_gym/logo.jpg',
];
