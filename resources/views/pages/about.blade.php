@extends('layouts.app')

@section('content')
<!-- This component requires Tailwind CSS >= 1.5.1 and @tailwindcss/ui >= 0.4.0 -->
<div class="py-16 xl:py-32 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
  <div class="max-w-max-content lg:max-w-7xl mx-auto">
    <div class="relative z-10 mb-8 md:mb-2 md:px-6">
      <div class="text-base max-w-prose lg:max-w-none">
        <p class="leading-6 text-red-600 font-semibold tracking-wide uppercase">About Us</p>
        <h1 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">Public records, open-source software</h1>
      </div>
    </div>
    <div class="relative">
      <svg class="hidden md:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="95e8f2de-6d30-4b7e-8159-f791729db21b" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#95e8f2de-6d30-4b7e-8159-f791729db21b)" />
      </svg>
      <svg class="hidden md:block absolute bottom-0 left-0 -mb-20 -ml-20" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="7a00fe67-0343-4a3c-8e81-c145097a3ce0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#7a00fe67-0343-4a3c-8e81-c145097a3ce0)" />
      </svg>
      <div class="relative md:bg-white md:p-6">
        <div class="lg:grid lg:grid-cols-2 lg:gap-6 mb-8">
          <div class="prose prose-lg text-gray-500 mb-6 lg:max-w-none lg:mb-0 pr-4">
            <p><span class="font-bold">The Grytte Organization</span> was founded in 2018 by a now-former student from The Browning School. Our mission is to provide Browning’s community with an insight into the non-profit’s financial health. The school is obligated to file annual financial statements (known as Form 990) with the IRS, all of which are open to public inspection.</li>
            <p>Grytte (pronounced "grit") is The Browning School's motto, symbolizing perseverance, patience, and perspective.</p>
          </div>
          <div class="prose prose-lg text-gray-500">
            <p>In addition to hosting an archive of Browning's financial records, we have compiled an overview of statistics and trends dating back to the early 2000s. When analyzing a specific fiscal year, we encourage all users to preview the overall trend for that data point.</p>
            <p>The platform we use to host and operate Grytte.org was created with Laravel, Tailwind CSS, and Chart.js. This software is open-source and available to the public on our GitHub. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="faq" class="bg-gray-100">
  <div class="max-w-screen-xl mx-auto pt-12 pb-16 sm:pt-16 sm:pb-20 px-4 sm:px-6 lg:py-24 lg:px-8">
    <h2 class="text-3xl leading-9 font-extrabold text-gray-900">
      Frequently Asked Questions
    </h2>
    <div class="mt-6 border-t-2 border-gray-300 pt-10">
      <dl class="md:grid md:grid-cols-2 md:gap-8">
        <div>
          <div>
            <dt class="text-lg leading-6 font-medium text-gray-900">
              What is IRS Form 990?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                Organizations claiming federal tax-exempt status must file a Form 990 with the Internal Revenue Service every fiscal year. The form serves as a public record of financial information for the non-profit.
              </p>
            </dd>
          </div>
          <div class="mt-12">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              Is it legal to store and share this information?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                Yes! Every Form 990 that a non-profit files with the IRS is open to public inspection under <a class="text-red-600 hover:text-red-500 transition duration-150 ease-in-out" href="https://www.law.cornell.edu/uscode/text/26/6104">26 U.S. Code § 6104</a>.
              </p>
            </dd>
          </div>
          <div class="mt-12">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              How can I contribute?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                This website is built with open-source software hosted on <a class="text-red-600 hover:text-red-500 transition duration-150 ease-in-out" href="https://github.com/seb646/grytte.org">GitHub</a>. If you'd like to help with this project, please contribute to our repository!
              </p>
            </dd>
          </div>
        </div>
        <div class="mt-12 md:mt-0">
          <div>
            <dt class="text-lg leading-6 font-medium text-gray-900">
              What kind of information can I find in Form 990?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                The form typically includes an organiation's assets, revenue, expenses, and highest paid officers. You can also find information about an organization's board, independent contractors, and fundraising activities. 
              </p>
            </dd>
          </div>
          <div class="mt-12">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              Where do you find these documents?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                We use <a class="text-red-600 hover:text-red-500 transition duration-150 ease-in-out" href="https://projects.propublica.org/nonprofits/">ProPublica's Nonprofit Explorer</a> to find PDF copies of The Browning School's filings of Form 990.
              </p>
            </dd>
          </div>
          <div class="mt-12">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              How do I create a website for my school?
            </dt>
            <dd class="mt-2">
              <p class="text-base leading-6 text-gray-500">
                Read our <a class="text-red-600 hover:text-red-500 transition duration-150 ease-in-out" href="https://github.com/seb646/grytte.org/blob/master/README.md">documentation</a> to learn how to deploy our software on your website! Our website is built with Laravel and Tailwind CSS.
              </p>
            </dd>
          </div>
        </div>
      </dl>
    </div>
  </div>
</div>

@endsection