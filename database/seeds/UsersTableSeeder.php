<?php

use Illuminate\Database\Seeder;
use GeniusTS\Roles\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Role::where('slug','admin')->first();
        $user = Role::where('slug','user')->first();
        factory('App\User', 1)->create([
        	'name' => '林毅',
            'username' => 'linyi',
        	'email' => 'ahlinyi@qq.com',
        	'password' => '123456'
        ])->each(function ($u) use ($admin){
            $u->attachRole($admin);
        });

        foreach ($this->admins() as $a) {
            factory('App\User', 1)->create($a)->each(function ($u) use ($user){
                $u->attachRole($user);
            });
        }
    }

    public function admins()
    {
        return array(
            array('name' => '陈智垚','username' => '18392560241','password' => '123456','openid' => 'oHwEGs4Rj1cB5aDeZJFEvcGqxv7A','dingid' => NULL),
            array('name' => '侯鹏辉','username' => '18629462019','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '刘一锋','username' => '18666129808','password' => '123456','openid' => 'oHwEGszO2w1JjuAFsDBY3h4ni3i0','dingid' => '254201083215'),
            array('name' => '张泽镇','username' => '15633705651','password' => '123456','openid' => 'oHwEGsxKl-Z2R4SG5kRZVINB1A6s','dingid' => NULL),
            array('name' => '庄子豪','username' => '18629028175','password' => '123456','openid' => 'oHwEGsw0XJl14gp_qO5jzYrSZesg','dingid' => NULL),
            array('name' => '林毅','username' => '18710859309','password' => '123456','openid' => 'oHwEGs2nlJMpKJO7Id7-cIJOq7cY','dingid' => '0865600218849678'),
            array('name' => '戴胤','username' => '15940512184','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '汪兵','username' => '18671345607','password' => '123456','openid' => 'oHwEGs8ES1evXgp2_gj2hxM44Qh8','dingid' => NULL),
            array('name' => '杨炬','username' => '15551292370','password' => '123456','openid' => 'oHwEGs06rwb7rUho3jF8iYg6a7sY','dingid' => NULL),
            array('name' => '高鹤','username' => '18328584045','password' => '123456','openid' => 'oHwEGs_aS7hS7pjPJLVq0uJVqmrU','dingid' => NULL),
            array('name' => '丁培龙','username' => '17602250312','password' => '123456','openid' => 'oHwEGs3eKLGuiPbn1T1IVDFe3KTs','dingid' => NULL),
            array('name' => '阴家玮','username' => '18791067855','password' => '123456','openid' => 'oHwEGs2RDi6PwXmX6FsIhqlA5D7k','dingid' => NULL),
            array('name' => '胡凯旋','username' => '18137497360','password' => '123456','openid' => 'oHwEGs_Yic5hC0z6PcGIz9CaSJW4','dingid' => NULL),
            array('name' => '胡博','username' => '13614480281','password' => '123456','openid' => 'oHwEGsz9P8JHckBz3KdM_E2wJZac','dingid' => NULL),
            array('name' => '张毅斌','username' => '13877414900','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '丁梦妍','username' => '18852735063','password' => '123456','openid' => 'oHwEGs3PzbTgHfzP1AhxIqc-vqJs','dingid' => NULL),
            array('name' => '陈光华','username' => '15520061820','password' => '123456','openid' => 'oHwEGswbIOvGOCsdktYVgioKExi0','dingid' => NULL),
            array('name' => '马荣迪','username' => '15510322232','password' => '123456','openid' => 'oHwEGs12iPFAjwxAOcBYpzC2JY-o','dingid' => NULL),
            array('name' => '曹凯','username' => '13757157754','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '陆江铭','username' => '18577395433','password' => '123456','openid' => 'oHwEGs7Py9GJSDnLVFKQc-Jv_iTg','dingid' => NULL),
            array('name' => '杨易龙','username' => '18292826091','password' => '123456','openid' => 'oHwEGsxH6SBKZYxoiR1JcMvXWUMY','dingid' => NULL),
            array('name' => '蔡子奇','username' => '17854173619','password' => '123456','openid' => 'oHwEGs-XCuucHceX-kC_Rb7kqmv0','dingid' => NULL),
            array('name' => '高泽意','username' => '15669900230','password' => '123456','openid' => 'oHwEGs_PovSyQeMFDkj5fX27kPMw','dingid' => NULL),
            array('name' => '袁嘉欣','username' => '15521017010','password' => '123456','openid' => 'oHwEGs8Ylpxi4mder3Cq0cyMT_xQ','dingid' => NULL),
            array('name' => '陈涛','username' => '15223945917','password' => '123456','openid' => 'oHwEGs_PA6LovILBq6qv2HupxtqM','dingid' => NULL),
            array('name' => '雷品源','username' => '13032865202','password' => '123456','openid' => 'oHwEGs8wfjx6f_NmfIOdHPvtpZkc','dingid' => NULL),
            array('name' => '李雪瑞','username' => '15735183386','password' => '123456','openid' => 'oHwEGs-blAuRtUwtsghGKaDHND6Y','dingid' => NULL),
            array('name' => '潘莹','username' => '18843105437','password' => '123456','openid' => 'oHwEGs2V-fw8Ix6Z2HR2kiL6RUW0','dingid' => NULL),
            array('name' => '叶宗浩','username' => '13918043723','password' => '123456','openid' => 'oHwEGsx4S0QrGjM6OQO6Ea1vsjE8','dingid' => NULL),
            array('name' => '黄想','username' => '17865427860','password' => '123456','openid' => 'oHwEGs3QzBa0UKaKPSGLY14xgINk','dingid' => NULL),
            array('name' => '王哲','username' => '18833050579','password' => '123456','openid' => 'oHwEGs-37fPP502cmxE6I8ULgjAI','dingid' => NULL),
            array('name' => '曲劭琨','username' => '18217025290','password' => '123456','openid' => 'oHwEGs2FIy9mQWLLEehpWrisjcGE','dingid' => NULL),
            array('name' => '曹志渊','username' => '13093452918','password' => '123456','openid' => 'oHwEGs8-TMjUzJDXsaqURKa-cDEw','dingid' => NULL),
            array('name' => '江浩男','username' => '15717951589','password' => '123456','openid' => 'oHwEGs1oH_adUznMymXR7dzwQ2n0','dingid' => NULL),
            array('name' => '朱鹏','username' => '18373474973','password' => '123456','openid' => 'oHwEGs-K-rg8WfgDEaRdDmxUvFrk','dingid' => NULL),
            array('name' => '叶华成','username' => '13972743591','password' => '123456','openid' => 'oHwEGs_yd0HN90G7uXDgKIoeK-q0','dingid' => NULL),
            array('name' => '刘晨雨','username' => '18335190980','password' => '123456','openid' => 'oHwEGsyjrmoJdyr6Q8FY4UcVxTE4','dingid' => NULL),
            array('name' => '任叶晨','username' => '15227825371','password' => '123456','openid' => 'oHwEGs9hqi1tRcD0Oq5pdGymKUvI','dingid' => NULL),
            array('name' => '刘一锋','username' => '18089248256','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '李申','username' => '15732155490','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '高铖涛','username' => '18829213409','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '张梦','username' => '15691757604','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '姚康','username' => '18683383337','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '刘嘉悦','username' => '15732190698','password' => '123456','openid' => 'oHwEGs9Vg8-eBIosHsFYOAfSDRPM','dingid' => NULL),
            array('name' => '谭新乐','username' => '15277129831','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '郝加福','username' => '15621555507','password' => '123456','openid' => NULL,'dingid' => NULL),
            array('name' => '张世成','username' => '18687199670','password' => '123456','openid' => 'oHwEGs-WrH-dZVwl7aZstBpOqA1Y','dingid' => NULL),
            array('name' => '罗爱华','username' => '13281080121','password' => '123456','openid' => 'oHwEGs6k_3HBlvz-tfEsCWpQO6Zc','dingid' => NULL),
            array('name' => '张凯博','username' => '18958570999','password' => '123456','openid' => 'oHwEGs0Cg-U7ZRep5mlXFaTFtR9U','dingid' => NULL),
            array('name' => '郭天舒','username' => '18698905226','password' => '123456','openid' => 'oHwEGswns4kW_ZTOcKduOzwOUXyw','dingid' => NULL),
            array('name' => '王宝琳','username' => '18750765011','password' => '123456','openid' => 'oHwEGs6FQ4HbIIByrSS6A2bBSG9M','dingid' => NULL),
            array('name' => '梁子豪','username' => '13686527346','password' => '123456','openid' => 'oHwEGsypDo8F5o0xhe2GThdANJfc','dingid' => NULL),
            array('name' => '侯嘉琪','username' => '18566489376','password' => '123456','openid' => 'oHwEGsx0WyaJFG5OyJdIQWz2BpUY','dingid' => NULL),
            array('name' => '谭乔瑜','username' => '15697738637','password' => '123456','openid' => 'oHwEGs704Zcuds9c34uJTnwpEPOc','dingid' => NULL),
            array('name' => '唐子腾','username' => '18569424117','password' => '123456','openid' => 'oHwEGs_pCdjg2ZaSn8K9I9_C_Psc','dingid' => NULL),
            array('name' => '王慧琪','username' => '17671710936','password' => '123456','openid' => 'oHwEGs5fdioBbjmhLCmR8ItyaDmA','dingid' => NULL),
            array('name' => '刘淑慧','username' => '13262522479','password' => '123456','openid' => 'oHwEGs_ocejug8_zVxynihw9xRlE','dingid' => NULL)
        );
    }
}
