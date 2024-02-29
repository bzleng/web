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
        <?php include('sidebar.php'); ?>
</div>


    <!-- Main content -->
    <div class="flex-1 p-8">
        <h1 class="text-4xl font-bold text-sky-500 text-center my-12 prompt">&gt; blog</h1>
        <div id="posts" class="space-y-6">
            <!-- Posts will be loaded here -->
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('getPosts.php<?php echo isset($_GET['id']) ? '?id=' . $_GET['id'] : '' ?>')
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
                        <h2 class="text-2xl font-bold text-sky-500">${post.title}</h2>
                        <p class="text-blue-600">${post.date} by ${post.author}</p>
                        <p class="mt-4 text-gray-300">${post.content ? post.content : post.summary}</p>
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
