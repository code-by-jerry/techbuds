<?php

namespace Database\Seeders;

use App\Models\ToolCategory;
use App\Models\ToolLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Learning & Docs',
                'slug' => 'learning-docs',
                'description' => 'Educational resources and documentation for developers and designers',
                'order' => 1,
                'is_active' => true,
                'links' => [
                    ['title' => 'MDN Web Docs', 'url' => 'https://developer.mozilla.org/', 'description' => null, 'order' => 1],
                    ['title' => 'W3Schools', 'url' => 'https://www.w3schools.com/', 'description' => null, 'order' => 2],
                    ['title' => 'Web.dev', 'url' => 'https://web.dev/', 'description' => null, 'order' => 3],
                    ['title' => 'Frontend Mentor', 'url' => 'https://frontendmentor.io/', 'description' => null, 'order' => 4],
                    ['title' => 'Roadmap.sh', 'url' => 'https://roadmap.sh/', 'description' => null, 'order' => 5],
                    ['title' => 'FreeCodeCamp', 'url' => 'https://www.freecodecamp.org/', 'description' => null, 'order' => 6],
                    ['title' => 'CSS Tricks', 'url' => 'https://css-tricks.com/', 'description' => null, 'order' => 7],
                    ['title' => 'GeeksForGeeks', 'url' => 'https://www.geeksforgeeks.org/', 'description' => null, 'order' => 8],
                ],
            ],
            [
                'name' => 'CSS / UI Tools',
                'slug' => 'css-ui-tools',
                'description' => 'Tools for creating CSS animations, UI components, and design elements',
                'order' => 2,
                'is_active' => true,
                'links' => [
                    ['title' => 'Animista', 'url' => 'https://animista.net/', 'description' => null, 'order' => 1],
                    ['title' => 'Animate.style', 'url' => 'https://animate.style/', 'description' => null, 'order' => 2],
                    ['title' => 'Anime.js', 'url' => 'https://animejs.com/', 'description' => null, 'order' => 3],
                    ['title' => 'UIverse', 'url' => 'https://uiverse.io/', 'description' => null, 'order' => 4],
                    ['title' => 'Glassmorphism', 'url' => 'https://glassmorphism.com/', 'description' => null, 'order' => 5],
                    ['title' => 'Neumorphism.io', 'url' => 'https://neumorphism.io/#55b9f3', 'description' => null, 'order' => 6],
                    ['title' => 'CSS Gradient', 'url' => 'https://cssgradient.io/', 'description' => null, 'order' => 7],
                    ['title' => 'GetWaves', 'url' => 'https://getwaves.io/', 'description' => null, 'order' => 8],
                    ['title' => 'Haikei', 'url' => 'https://haikei.app/', 'description' => null, 'order' => 9],
                    ['title' => 'Shadows Generator', 'url' => 'https://shadows.brumm.af/', 'description' => null, 'order' => 10],
                ],
            ],
            [
                'name' => 'Colors & Palettes',
                'slug' => 'colors-palettes',
                'description' => 'Color palette generators and color tools for design',
                'order' => 3,
                'is_active' => true,
                'links' => [
                    ['title' => 'Coolors', 'url' => 'https://coolors.co/', 'description' => null, 'order' => 1],
                    ['title' => 'Color Hunt', 'url' => 'https://colorhunt.co/', 'description' => null, 'order' => 2],
                    ['title' => 'MyColorSpace', 'url' => 'https://mycolor.space/', 'description' => null, 'order' => 3],
                    ['title' => 'UI Colors', 'url' => 'https://ui.colors.sh/', 'description' => null, 'order' => 4],
                    ['title' => 'Happy Hues', 'url' => 'https://www.happyhues.co/', 'description' => null, 'order' => 5],
                ],
            ],
            [
                'name' => 'SVG & Backgrounds',
                'slug' => 'svg-backgrounds',
                'description' => 'SVG generators and background pattern tools',
                'order' => 4,
                'is_active' => true,
                'links' => [
                    ['title' => 'MagicPattern', 'url' => 'https://www.magicpattern.design/', 'description' => null, 'order' => 1],
                    ['title' => 'SVG Backgrounds', 'url' => 'https://www.svgbackgrounds.com/', 'description' => null, 'order' => 2],
                    ['title' => 'Svgl.app', 'url' => 'https://svgl.app/', 'description' => null, 'order' => 3],
                    ['title' => 'Blobmaker', 'url' => 'https://blobmaker.app/', 'description' => null, 'order' => 4],
                    ['title' => 'Pattern Monster', 'url' => 'https://pattern.monster/', 'description' => null, 'order' => 5],
                ],
            ],
            [
                'name' => 'Icons',
                'slug' => 'icons',
                'description' => 'Icon libraries and icon resources',
                'order' => 5,
                'is_active' => true,
                'links' => [
                    ['title' => 'Iconify', 'url' => 'https://iconify.design/', 'description' => null, 'order' => 1],
                    ['title' => 'Flaticon', 'url' => 'https://www.flaticon.com/', 'description' => null, 'order' => 2],
                    ['title' => 'IconFinder', 'url' => 'https://www.iconfinder.com/', 'description' => null, 'order' => 3],
                    ['title' => '3D Icons', 'url' => 'https://3dicons.co/', 'description' => null, 'order' => 4],
                    ['title' => 'Icons8', 'url' => 'https://icons8.com/', 'description' => null, 'order' => 5],
                    ['title' => 'Lordicon', 'url' => 'https://lordicon.com/', 'description' => null, 'order' => 6],
                ],
            ],
            [
                'name' => 'Loaders & Effects',
                'slug' => 'loaders-effects',
                'description' => 'Loading animations and visual effects',
                'order' => 6,
                'is_active' => true,
                'links' => [
                    ['title' => 'UI Ball Loaders', 'url' => 'https://uiball.com/ldrs/', 'description' => null, 'order' => 1],
                    ['title' => 'Whirl CSS Loaders', 'url' => 'https://whirl.netlify.app/', 'description' => null, 'order' => 2],
                    ['title' => 'CSS Loader Generator', 'url' => 'https://cssloaders.github.io/', 'description' => null, 'order' => 3],
                ],
            ],
            [
                'name' => 'AI Tools',
                'slug' => 'ai-tools',
                'description' => 'AI-powered design and development tools',
                'order' => 7,
                'is_active' => true,
                'links' => [
                    ['title' => 'Recraft', 'url' => 'https://app.recraft.ai/community', 'description' => null, 'order' => 1],
                    ['title' => 'Pixcap', 'url' => 'https://pixcap.com/', 'description' => null, 'order' => 2],
                    ['title' => 'Remove.bg', 'url' => 'https://remove.bg/', 'description' => null, 'order' => 3],
                    ['title' => 'Cleanup.pictures', 'url' => 'https://cleanup.pictures/', 'description' => null, 'order' => 4],
                    ['title' => 'Photoroom', 'url' => 'https://photoroom.com/', 'description' => null, 'order' => 5],
                    ['title' => 'Framer', 'url' => 'https://www.framer.com/marketplace', 'description' => null, 'order' => 6],
                ],
            ],
            [
                'name' => 'Stock Images & Illustrations',
                'slug' => 'stock-images-illustrations',
                'description' => 'Free stock images and illustration resources',
                'order' => 8,
                'is_active' => true,
                'links' => [
                    ['title' => 'Unsplash', 'url' => 'https://unsplash.com/', 'description' => null, 'order' => 1],
                    ['title' => 'Pexels', 'url' => 'https://pexels.com/', 'description' => null, 'order' => 2],
                    ['title' => 'Picjumbo', 'url' => 'https://picjumbo.com/', 'description' => null, 'order' => 3],
                    ['title' => 'Storyset', 'url' => 'https://storyset.com/', 'description' => null, 'order' => 4],
                    ['title' => 'Undraw', 'url' => 'https://undraw.co/illustrations', 'description' => null, 'order' => 5],
                    ['title' => 'Isometric Online', 'url' => 'https://isometric.online/', 'description' => null, 'order' => 6],
                ],
            ],
            [
                'name' => 'All-in-one Tools',
                'slug' => 'all-in-one-tools',
                'description' => 'Comprehensive tool collections for developers and designers',
                'order' => 9,
                'is_active' => true,
                'links' => [
                    ['title' => '10015 Tools', 'url' => 'https://10015.io/', 'description' => null, 'order' => 1],
                    ['title' => 'Toools.design', 'url' => 'https://www.toools.design/', 'description' => null, 'order' => 2],
                    ['title' => 'Omatsuri', 'url' => 'https://omatsuri.app/', 'description' => null, 'order' => 3],
                    ['title' => 'CanIUse', 'url' => 'https://caniuse.com/', 'description' => null, 'order' => 4],
                ],
            ],
            [
                'name' => 'Code Tools',
                'slug' => 'code-tools',
                'description' => 'Online code editors and development tools',
                'order' => 10,
                'is_active' => true,
                'links' => [
                    ['title' => 'Codepen', 'url' => 'https://codepen.io/', 'description' => null, 'order' => 1],
                    ['title' => 'JSFiddle', 'url' => 'https://jsfiddle.net/', 'description' => null, 'order' => 2],
                    ['title' => 'Regex101', 'url' => 'https://regex101.com/', 'description' => null, 'order' => 3],
                    ['title' => 'Carbon', 'url' => 'https://carbon.now.sh/', 'description' => null, 'order' => 4],
                    ['title' => 'PlayCode', 'url' => 'https://playcode.io/', 'description' => null, 'order' => 5],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $links = $categoryData['links'];
            unset($categoryData['links']);

            $category = ToolCategory::create($categoryData);

            foreach ($links as $linkData) {
                ToolLink::create([
                    'tool_category_id' => $category->id,
                    'title' => $linkData['title'],
                    'url' => $linkData['url'],
                    'description' => $linkData['description'],
                    'order' => $linkData['order'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
