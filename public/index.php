<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bzleng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Courier New', monospace;
        }
        .prompt {
            color: #0369a1;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh; /* Full height sidebar */
        }
        .nav-link {
            
            padding: 0.5rem 0;
            display: block;
            text-decoration: none;

        }
    </style>
</head>
<body>

<div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar p-4 shadow-lg bg-sky-500/100">
    <h1 class="text-4xl text-stone-200 font-bold text-center mb-8">bzleng</h1>
    <nav class="mt-8">
        <a href="/" class="text-gray-900 hover:text-gray-600 nav-link">Blog</a>
        <a href="/peering.html" class="text-gray-900 hover:text-gray-600 nav-link">Peering</a>
        <!-- Update the href attribute to the correct paths for your links -->
    </nav>
</div>


    <!-- Main content -->
    <div class="flex-1 p-8">
        <h1 class="text-4xl font-bold text-center my-12 prompt">> blog</h1>
        <div id="posts" class="space-y-6">
            <!-- Posts will be loaded here -->
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('getPosts.php')
        .then(response => response.json())
        .then(posts => {
            const postsContainer = document.getElementById('posts');
            
            // Check if there are no posts
            if (posts.length === 0) {
                const noPostsElement = document.createElement('div');
                noPostsElement.classList.add('text-center', 'text-gray-500', 'mt-10');
                noPostsElement.textContent = "No posts available at the moment.";
                postsContainer.appendChild(noPostsElement);
            } else {
                // If there are posts, proceed to display them
                posts.forEach(post => {
                    const postElement = document.createElement('div');
                    postElement.classList.add('bg-gray-800', 'p-6', 'rounded-lg', 'mb-6');
                    postElement.innerHTML = `
                        <h2 class="text-2xl font-bold prompt">> ${post.title}</h2>
                        <p class="text-blue-400">${post.date} by ${post.author}</p>
                        <p class="mt-4 text-gray-300">${post.content}</p>
                    `;
                    postsContainer.appendChild(postElement);
                });
            }
        })
        .catch(error => {
            console.error('Error loading posts:', error);
            const postsContainer = document.getElementById('posts');
            const errorElement = document.createElement('div');
            errorElement.classList.add('text-center', 'text-red-500', 'mt-10');
            errorElement.textContent = "Failed to load posts. Please try again later.";
            postsContainer.appendChild(errorElement);
        });
});


</script>

</body>
</html>
