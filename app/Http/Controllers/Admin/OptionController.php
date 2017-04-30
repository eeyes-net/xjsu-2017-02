<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\Post;

class OptionController extends Controller
{
    /**
     * 编辑选项
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $body_prepend = Option::getOption('body_prepend', '');
        $carousels = Option::getOption('carousels', []);
        $xjsu_introduction = Option::getOption('xjsu_introduction', '');
        $xjsu_introduction_more = Option::getOption('xjsu_introduction_more', '');
        $ministers = Option::getOption('ministers', []);
        $presidium = Option::getOption('presidium', []);
        $links = Option::getOption('links', []);
        $contact_us = Option::getOption('contact_us', '');
        $about_website = Option::getOption('about_website', '');

        foreach ($carousels as &$item) {
            $item = $item['id'] . '||' . $item['image'];
        }
        $carousels = implode("\n", $carousels);
        foreach ($ministers as &$item) {
            $item = $item['name'] . '||' . $item['id'];
        }
        $ministers = implode("\n", $ministers);
        foreach ($presidium as &$item) {
            $item = $item['name'] . '||' . $item['id'] . '||' . $item['introduction'];
        }
        $presidium = implode("\n", $presidium);
        foreach ($links as &$item) {
            $item = $item['name'] . '||' . $item['url'];
        }
        $links = implode("\n", $links);

        return view('admin.options.edit', compact(
            'body_prepend',
            'carousels',
            'xjsu_introduction',
            'xjsu_introduction_more',
            'presidium',
            'ministers',
            'links',
            'contact_us',
            'about_website'
        ));
    }

    /**
     * 保存选项
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $body_prepend = request('body_prepend', '');
        $carousels = request('carousels', '');
        $xjsu_introduction = request('xjsu_introduction', '');
        $xjsu_introduction_more = request('xjsu_introduction_more', '');
        $presidium = request('presidium', '');
        $ministers = request('ministers', '');
        $links = request('links', '');
        $contact_us = request('contact_us', '');
        $about_website = request('about_website', '');

        $carousels_explode = explode("\n", $carousels);
        $carousels = [];
        foreach ($carousels_explode as &$item) {
            $explode = explode("||", $item, 2);
            if (count($explode) >= 2) {
                $id = (int)trim($explode[0]);
                if (Post::find($id)) {
                    $carousels[] = [
                        'id' => $id,
                        'image' => trim($explode[1]),
                    ];
                }
            }
        }

        $presidium_explode = explode("\n", $presidium);
        $presidium = [];
        foreach ($presidium_explode as &$item) {
            $explode = explode("||", $item, 3);
            if (count($explode) >= 3) {
                $id = (int)trim($explode[1]);
                if (Post::find($id)) {
                    $presidium[] = [
                        'name' => trim($explode[0]),
                        'id' => $id,
                        'introduction' => trim($explode[2]),
                    ];
                }
            }
        }

        $ministers_explode = explode("\n", $ministers);
        $ministers = [];
        foreach ($ministers_explode as &$item) {
            $explode = explode("||", $item, 2);
            if (count($explode) >= 2) {
                $id = (int)trim($explode[1]);
                if (Post::find($id)) {
                    $ministers[] = [
                        'name' => trim($explode[0]),
                        'id' => $id,
                    ];
                }
            }
        }

        $service_links_explode = explode("\n", $links);
        $links = [];
        foreach ($service_links_explode as &$item) {
            $explode = explode("||", $item, 2);
            if (count($explode) >= 2) {
                $links[] = [
                    'name' => trim($explode[0]),
                    'url' => trim($explode[1]),
                ];
            }
        }

        Option::setOption('body_prepend', $body_prepend);
        Option::setOption('carousels', $carousels);
        Option::setOption('xjsu_introduction', $xjsu_introduction);
        Option::setOption('xjsu_introduction_more', $xjsu_introduction_more);
        Option::setOption('presidium', $presidium);
        Option::setOption('ministers', $ministers);
        Option::setOption('links', $links);
        Option::setOption('contact_us', $contact_us);
        Option::setOption('about_website', $about_website);
        return redirect(action('Admin\\OptionController@edit'));
    }
}
