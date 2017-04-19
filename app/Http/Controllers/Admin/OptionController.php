<?php

namespace App\Http\Controllers\Admin;

use App\Option;

class OptionController extends Controller
{
    /**
     * 显示所有选项状态
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Option::getOption(['no_register']));
        return view('admin.options.index');
    }

    /**
     * 编辑选项
     *
     * @param string $name 选项名称
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $value = Option::getOption($name);
        return view('admin.options.' . $name, compact('value'));
    }

    /**
     * 保存选项
     *
     * @param string $name 选项名称
     *
     * @return \Illuminate\Http\Response
     */
    public function update($name)
    {
        $value = request('value');
        switch ($name) {
            case 'departments':
            case 'links':
            case 'nav':
            case 'presidium':
                $value_no_blank = [];
                foreach ($value as $value1) {
                    $flag = true;
                    foreach ($value1 as $item) {
                        if (!$item) {
                            $flag = false;
                            break;
                        }
                    }
                    if ($flag) {
                        $value_no_blank[] = $value1;
                    }
                }
                $value = $value_no_blank;
                break;
            case 'no_register':
            case 'xjsu_introduction':
                break;
            default:
                return '<span style="font-size:100px">滚！</span>';
        }
        Option::setOption($name, $value);
        return redirect(action('Admin\\OptionController@edit', ['name' => $name]));
    }
}
