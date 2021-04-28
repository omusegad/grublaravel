<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomecontentfoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homecontentfood', function(Blueprint $table)
		{
			$table->id('id');
			$table->string('vCode');
			$table->text('header_first_label')->comment('home_first_first_title');
			$table->string('header_second_label')->comment('home_second_first_title');
			$table->string('home_banner_left_image')->comment('home_banner_image');
			$table->text('left_banner_txt');
			$table->string('home_banner_right_image')->comment('home_second_right_banner_image');
			$table->text('right_banner_txt');
			$table->string('third_sec_title')->comment('home_third_first_title');
			$table->text('third_sec_desc')->comment('home_first_second_texthome_first_second_content');
			$table->string('third_mid_image_one');
			$table->string('third_mid_title_one')->comment('home_third_second_text');
			$table->text('third_mid_desc_one')->comment('home_first_four_button_content');
			$table->string('third_mid_image_two')->comment('home_third_banner_image');
			$table->string('third_mid_title_two')->comment('home_fours_first_text');
			$table->text('third_mid_desc_two')->comment('home_second_second_content');
			$table->string('third_mid_image_three',)->comment('home_fours_icon_image');
			$table->string('third_mid_title_three')->comment('home_fours_second_text');
			$table->text('third_mid_desc_three')->comment('home_third_third_content');
			$table->string('mobile_app_bg_img');
			$table->string('mobile_app_left_img');
			$table->string('mobile_app_right_title')->comment('home_six_first_title');
			$table->text('mobile_app_right_desc')->comment('home_six_second_content');
			$table->string('taxi_app_bg_img')->comment('home_five_left_banner_image');
			$table->string('taxi_app_left_img')->comment('home_six_banner_image');
			$table->string('taxi_app_right_title');
			$table->text('taxi_app_right_desc')->comment('home_five_second_content');
			$table->text('driver_sec_first_label');
			$table->text('driver_sec_second_label');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->string('third_mid_image_one1');
			$table->string('third_mid_title_one1')->comment('home_five_first_title');
			$table->text('third_mid_desc_one1');
			$table->string('third_mid_image_two1');
			$table->string('third_mid_title_two1');
			$table->text('third_mid_desc_two1')->comment('home_first_third_button_content');
			$table->string('third_mid_image_three1');
			$table->string('third_mid_title_three1')->comment('home_seven_first_title');
			$table->text('third_mid_desc_three1')->comment('home_seven_second_content');
			$table->string('mobile_app_bg_img1')->comment('home_seven_banner_image');
			$table->string('vBannerBgImage');
			$table->string('vBannerLeftImg');
			$table->string('vBannerRightTitle');
			$table->string('vBannerRightTitleSmall');
			$table->text('tBannerRightContent');
			$table->string('vDeliveryPartTitle');
			$table->text('vDeliveryPartContent');
			$table->string('vDeliveryPartBgImg');
			$table->string('vDeliveryPartImg');
			$table->string('vMidSectionTitle');
			$table->string('vMidFirstImg');
			$table->string('vMidFirstTitle');
			$table->text('tMidFirstContent');
			$table->string('vMidSecondImg');
			$table->string('vMidSecondTitle');
			$table->text('tMidSecondContent');
			$table->string('vMidThirdImg');
			$table->string('vMidThirdTitle');
			$table->text('tMidThirdContent');
			$table->string('vThirdSectionImg1');
			$table->string('vThirdSectionImg2');
			$table->string('vThirdSectionImg3');
			$table->string('vThirdSectionRightTitle');
			$table->text('tThirdSectionRightContent');
			$table->string('vThirdSectionAPPImgAPPStore');
			$table->string('vThirdSectionAPPImgPlayStore');
			$table->string('vLastSectionTitle');
			$table->string('vLastSectionImg');
			$table->string('vLastSectionFirstTitle');
			$table->text('tLastSectionFirstContent');
			$table->string('vLastSectionSecondTitle');
			$table->text('tLastSectionSecondContent');
			$table->string('vLastSectionThirdTitle');
			$table->text('tLastSectionThirdContent');
			$table->string('vLastSectionFourthTitle');
			$table->text('tLastSectionFourthContent');
			$table->string('vLastSectionFifthTitle');
			$table->text('tLastSectionFifthContent');
			$table->string('vLastSectionSixthTitle');
			$table->text('tLastSectionSixthContent');
			$table->string('BannerBgImage');
			$table->string('BannerBigTitle');
			$table->string('BannerSmallTitle');
			$table->string('BannerContent');
			$table->string('FirstSectionLeftImage');
			$table->text('FirstSectionHeading');
			$table->text('FirstParaTitle');
			$table->text('FirstParaContent');
			$table->text('SecondParaTitle');
			$table->text('SecondParaContent');
			$table->text('ThirdParaTitle');
			$table->text('ThirdParaContent');
			$table->text('MidFirstImage');
			$table->text('MidFirstTitle');
			$table->text('MidFirstContent');
			$table->text('MidSecImage');
			$table->text('MidSecTitle');
			$table->text('MidSecContent');
			$table->text('MidThirdImage');
			$table->text('MidThirdTitle');
			$table->text('MidThirdContent');
			$table->text('ThirdLeftImg1');
			$table->text('ThirdLeftImg2');
			$table->text('ThirdLeftImg3');
			$table->text('ThirdRightTitle');
			$table->text('ThirdRightContent');
			$table->text('PlayStoreImg');
			$table->text('AppStoreImg');
			$table->text('AboutUsBgImage');
			$table->text('AboutUsTitle');
			$table->text('AboutUsSecondTitle');
			$table->text('AboutUsContent');
			$table->text('HomeRestuarantSectionLabel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('homecontentfood');
	}

}
