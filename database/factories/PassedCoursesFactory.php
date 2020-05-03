<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PassedCourses;
use Faker\Generator as Faker;

$factory->define(PassedCourses::class, function (Faker $faker) {

    return [
        'passed_courses_category_id'=>\App\PassedCoursesCategory::all('id')->random()->id,
        'title'=>'عنوان دوره گذرانده شده',
        'content'=>"<ul>
	<li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. [ از 89 تا 95 ]
	<p>&nbsp;</p>
	</li>
</ul>

<p><img alt=\"\" src=\"".asset('img/training_baje.png')."\" style=\"float:right; height:50px; margin-left:10px; margin-right:10px; width:50px\" />لورم ایپسوم <em><strong>متن ساختگی</strong></em> با تولید سادگی <span style=\"color:#000000\"><strong><u>نامفهوم</u></strong></span> از صنعت چاپ و با استفاده از طراحان گرافیک است.<span style=\"color:#8e44ad\"> [ از 89 تا 95 ]</span></p>

<p>&nbsp;</p>

<p><img alt=\"\" src=\"".asset('img/training_baje.png')."\" style=\"float:right; height:50px; margin-left:10px; margin-right:10px; width:50px\" />لورم ایپسوم <em><strong>متن ساختگی</strong></em> با تولید سادگی <span style=\"color:#000000\"><strong><u>نامفهوم</u></strong></span> از صنعت چاپ و با استفاده از طراحان گرافیک است.<span style=\"color:#8e44ad\"> [ از 89 تا 95 ]</span></p>

<p>&nbsp;</p>

<p><img alt=\"\" src=\"".asset('img/training_baje.png')."\" style=\"float:right; height:50px; margin-left:10px; margin-right:10px; width:50px\" />لورم ایپسوم <em><strong>متن ساختگی</strong></em> با تولید سادگی <span style=\"color:#000000\"><strong><u>نامفهوم</u></strong></span> از صنعت چاپ و با استفاده از طراحان گرافیک است.<span style=\"color:#8e44ad\"> [ از 89 تا 95 ]</span></p>",
        'user_id' => \App\User::all('id')->random()->id,
        'created_at' => now(),
    ];
});
