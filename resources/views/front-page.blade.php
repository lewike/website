@extends('layouts.app')

@section('content')
<section class="bg-top bg-no-repeat bg-[length:200%] md:bg-contain md:-mt-28">
  <div class="flex container mx-auto justify-evenly items-center py-8 md:py-0">
    <div class="top-intro leading-8 px-8 py-4 md:p-0">
      <h1 class="text-3xl font-semibold my-4">专业的网站建设服务商</h1>
      <p class="text-gray-600">信阳乐微网络——专注于企业建站服务，</p>
      <p class="text-gray-600">从域名注册，到主机空间，再到网站开发、推广和维护，</p>
      <p class="text-gray-600">让您拥有漂亮且稳定高速网站，为您的业务添砖加瓦！</p>
    </div>
    <img src="@asset('images/development.svg')" alt="专注于开发" width="450px" class="hidden md:my-28 md:block">
  </div>
  <div class="container mx-auto text-3xl pt-8 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16 justify-evenly text-center px-8 md:px-0">
      <div class="hover-up-5 shadow px-10 py-16 rounded-md bg-neutral-50">
        10+年开发经验
      </div>
      <div class="hover-up-5 shadow px-10 py-16 rounded-md bg-neutral-50">
        100+客户支持
      </div>
      <div class="hover-up-5 shadow px-10 py-16 rounded-md bg-neutral-50">
        3000+作品销量
      </div>
    </div>
  </div>
  <div class="bg-grey">
    <div class="container mx-auto py-8 md:py-16 px-8 md:px-0">
      <div class="bg-white text-center p-16 shadow leading-7 rounded-md">
        <h2 class="text-2xl font-semibold">我们的服务</h2>
        <p class="mt-4 mb-8 text-gray-600">一站式网站建设及维护服务，助力企事业单位业务拓展</p>
        <div class="block md:flex gap-x-20 our-services">
          <div class="wow fadeInUp">
            <img src="@asset('images/web-development.png')" alt="" class="hover-up-5">
            <h3 class="text-xl font-semibold">网站建设</h3>
            <p class="text-gray-600 mt-4">承接企业、电商、旅游、外贸等多种需求网站开发制作</p>
          </div>
          <div class="wow fadeInUp" data-wow-delay="0.5s">
            <img src="@asset('images/wechat-development.png')" alt="" class="hover-up-5">
            <h3 class="text-xl font-semibold">微信生态开发</h3>
            <p class="text-gray-600 mt-4">微信公众号、微官网、微信小程序开发及运维</p>
          </div>
          <div class="wow fadeInUp" data-wow-delay="1s">
            <img src="@asset('images/seo.png')" alt="" class="hover-up-5">
            <h3 class="text-xl font-semibold">网站优化推广</h3>
            <p class="text-gray-600 mt-4">专业的SEO从业经验，百度、360、Google排名优化</p>
          </div>
          <div class="wow fadeInUp" data-wow-delay="1.5s">
            <img src="@asset('images/services.png')" alt="" class="hover-up-5">
            <h3 class="text-xl font-semibold">网站托管运维</h3>
            <p class="text-gray-600 mt-4">域名注册、网站托管优化、服务器优化运维等</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container mx-auto text-center px-8 md:px-16 pb-8 md:pb-28 leading-7">
      <h3 class="text-2xl font-semibold">为什么选择我们？</h3>
      <p class="mt-4 mb-8 text-gray-600">我们始终坚信——专业、负责、高效、诚信——是维系你我的坚固桥梁</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 select-us">
        <div class="flex gap-6 items-center fadeInLeft wow" data-wow-delay="0.5s">
          <img src="@asset('images/wordpress.png')" alt="">
          <div class="p-6"  >
            <h3 class="text-xl font-semibold">基于WordPress建站系统</h3>
            <p class="text-gray-600 mt-4">全世界排名前1000W的网站，有1/3在使用WordPress，让您的网站也占一席之地</p>
          </div>
        </div>
        <div class="flex gap-6 items-center fadeInRight wow" data-wow-delay="1s">
          <img src="@asset('images/data-server.png')" alt="">
          <div class="p-6">
            <h3 class="text-xl font-semibold">高性能服务器托管</h3>
            <p class="text-gray-600 mt-4">国内网站托管于阿里云、腾讯云、西部数码等，外贸网站托管于 Vultr、Linode 等高性能服务器，稳定可保障</p>
          </div>
        </div>
        <div class="flex gap-6 items-center fadeInLeft wow" data-wow-delay="1.5s">
          <img src="@asset('images/responsive.png')" alt="">
          <div class="p-6">
            <h3 class="text-xl font-semibold">全平台、多语言支持方案</h3>
            <p class="text-gray-600 mt-4">
              全平台、多语言支持方案
              PC端、手机端、微信端自适应，一站式数据同步；支持多语言网站开发，助力国内外业务拓展</p>
          </div>
        </div>
        <div class="flex gap-6 items-center fadeInRight wow" data-wow-delay="2s">
          <img src="@asset('images/project.png')" alt="">
          <div class="p-6">
            <h3 class="text-xl font-semibold">专业的网站速度优化和运维服务
            </h3>
            <p class="text-gray-600 mt-4">10年的WordPress程序使用及开发经验+6年服务器配置优化经验，让您网站的访问速度快人一等</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
