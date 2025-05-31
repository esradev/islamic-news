<?php get_header(); ?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-islamic-green to-green-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Our Blog!!</h2>
            <p class="text-xl text-green-100">Discover insights, knowledge, and inspiration from Islamic perspectives</p>
        </div>
    </div>
</section>

<!-- Filter and Search Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
            <div class="flex flex-wrap gap-2">
                <button class="bg-islamic-green text-white px-4 py-2 rounded-full text-sm font-medium">All Posts</button>
                <button class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Quran & Hadith</button>
                <button class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Spirituality</button>
                <button class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Education</button>
                <button class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Global News</button>
                <button class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Culture</button>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search articles..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-islamic-green focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-islamic-green">
                    <option>Latest First</option>
                    <option>Oldest First</option>
                    <option>Most Popular</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="space-y-8">
                    <!-- Featured Post -->
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <img src="/placeholder.svg?height=300&width=600" alt="Featured Article" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-islamic-green text-white px-3 py-1 rounded-full text-sm font-medium">Featured</span>
                                <span class="text-gray-500 text-sm ml-3">March 15, 2024</span>
                                <span class="text-gray-500 text-sm ml-3">•</span>
                                <span class="text-gray-500 text-sm ml-3">8 min read</span>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                <a href="post.html">The Importance of Community in Islamic Life</a>
                            </h2>
                            <p class="text-gray-600 mb-4">Exploring how building strong community bonds strengthens our faith and creates lasting positive impact in society. This comprehensive guide examines the role of community in Islamic teachings and practical ways to foster meaningful connections...</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="/placeholder.svg?height=40&width=40" alt="Author" class="w-10 h-10 rounded-full mr-3">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Dr. Amina Hassan</p>
                                        <p class="text-sm text-gray-500">Islamic Scholar</p>
                                    </div>
                                </div>
                                <a href="post.html" class="bg-islamic-green hover:bg-green-800 text-white px-4 py-2 rounded-lg font-medium transition duration-300">Read Article</a>
                            </div>
                        </div>
                    </article>

                    <!-- Regular Posts -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="/placeholder.svg?height=200&width=300" alt="Article" class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-3">
                                    <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-medium">Spirituality</span>
                                    <span class="text-gray-500 text-sm ml-3">March 14, 2024</span>
                                    <span class="text-gray-500 text-sm ml-3">•</span>
                                    <span class="text-gray-500 text-sm ml-3">5 min read</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                    <a href="post.html">Finding Peace Through Daily Prayers</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Understanding the spiritual benefits of maintaining consistent prayer routines and how they transform our daily lives...</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/placeholder.svg?height=32&width=32" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700">Sheikh Omar Ali</span>
                                    </div>
                                    <a href="post.html" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="/placeholder.svg?height=200&width=300" alt="Article" class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-3">
                                    <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">Education</span>
                                    <span class="text-gray-500 text-sm ml-3">March 13, 2024</span>
                                    <span class="text-gray-500 text-sm ml-3">•</span>
                                    <span class="text-gray-500 text-sm ml-3">7 min read</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                    <a href="post.html">Islamic Education in Modern Times</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Balancing traditional Islamic teachings with contemporary educational needs in today's rapidly changing world...</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/placeholder.svg?height=32&width=32" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700">Dr. Fatima Ahmed</span>
                                    </div>
                                    <a href="post.html" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="/placeholder.svg?height=200&width=300" alt="Article" class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-3">
                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Culture</span>
                                    <span class="text-gray-500 text-sm ml-3">March 12, 2024</span>
                                    <span class="text-gray-500 text-sm ml-3">•</span>
                                    <span class="text-gray-500 text-sm ml-3">6 min read</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                    <a href="post.html">Celebrating Islamic Heritage</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Preserving and sharing the rich cultural traditions of the Islamic world for future generations...</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/placeholder.svg?height=32&width=32" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700">Prof. Hassan Malik</span>
                                    </div>
                                    <a href="post.html" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="/placeholder.svg?height=200&width=300" alt="Article" class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-3">
                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">Global News</span>
                                    <span class="text-gray-500 text-sm ml-3">March 11, 2024</span>
                                    <span class="text-gray-500 text-sm ml-3">•</span>
                                    <span class="text-gray-500 text-sm ml-3">4 min read</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                    <a href="post.html">Islamic Relief Efforts Worldwide</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Highlighting the humanitarian work and charitable initiatives led by Islamic organizations across the globe...</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/placeholder.svg?height=32&width=32" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700">Aisha Rahman</span>
                                    </div>
                                    <a href="post.html" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="md:flex">
                            <div class="md:w-1/3">
                                <img src="/placeholder.svg?height=200&width=300" alt="Article" class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-3">
                                    <span class="bg-islamic-green text-white px-3 py-1 rounded-full text-sm font-medium">Quran & Hadith</span>
                                    <span class="text-gray-500 text-sm ml-3">March 10, 2024</span>
                                    <span class="text-gray-500 text-sm ml-3">•</span>
                                    <span class="text-gray-500 text-sm ml-3">9 min read</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                    <a href="post.html">Understanding Quranic Wisdom</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Deep dive into the timeless wisdom of the Quran and its practical applications in contemporary life...</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/placeholder.svg?height=32&width=32" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700">Imam Abdullah</span>
                                    </div>
                                    <a href="post.html" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex items-center space-x-2">
                        <button class="px-3 py-2 text-gray-500 hover:text-islamic-green">Previous</button>
                        <button class="px-3 py-2 bg-islamic-green text-white rounded">1</button>
                        <button class="px-3 py-2 text-gray-700 hover:text-islamic-green">2</button>
                        <button class="px-3 py-2 text-gray-700 hover:text-islamic-green">3</button>
                        <button class="px-3 py-2 text-gray-700 hover:text-islamic-green">...</button>
                        <button class="px-3 py-2 text-gray-700 hover:text-islamic-green">10</button>
                        <button class="px-3 py-2 text-gray-700 hover:text-islamic-green">Next</button>
                    </nav>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    <!-- Popular Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Posts</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <img src="/placeholder.svg?height=60&width=80" alt="Popular Post" class="w-20 h-15 object-cover rounded">
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-900 hover:text-islamic-green transition duration-300">
                                        <a href="post.html">The Power of Gratitude in Islam</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">March 8, 2024</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <img src="/placeholder.svg?height=60&width=80" alt="Popular Post" class="w-20 h-15 object-cover rounded">
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-900 hover:text-islamic-green transition duration-300">
                                        <a href="post.html">Ramadan Preparation Guide</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">March 5, 2024</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <img src="/placeholder.svg?height=60&width=80" alt="Popular Post" class="w-20 h-15 object-cover rounded">
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-900 hover:text-islamic-green transition duration-300">
                                        <a href="post.html">Islamic Finance Principles</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">March 3, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Categories</h3>
                        <div class="space-y-2">
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                <span>Quran & Hadith</span>
                                <span class="text-sm text-gray-500">24</span>
                            </a>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                <span>Spirituality</span>
                                <span class="text-sm text-gray-500">18</span>
                            </a>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                <span>Education</span>
                                <span class="text-sm text-gray-500">15</span>
                            </a>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                <span>Global News</span>
                                <span class="text-sm text-gray-500">32</span>
                            </a>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                <span>Culture</span>
                                <span class="text-sm text-gray-500">12</span>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-islamic-green text-white rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Stay Updated</h3>
                        <p class="text-green-100 mb-4">Subscribe to our newsletter for weekly insights and updates</p>
                        <div class="space-y-3">
                            <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-islamic-gold">
                            <button class="w-full bg-islamic-gold hover:bg-yellow-600 text-white py-2 rounded font-semibold transition duration-300">Subscribe</button>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Islam</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Prayer</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Quran</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Community</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Faith</span>
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer">Education</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
