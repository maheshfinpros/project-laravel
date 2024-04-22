pipeline {
    agent any
    stages {
        stage('Deploy Code to Same Server') {
            steps {
                script {
                    // Deploy code using rsync to the same server for index.html
                    sh 'rsync -avz /var/lib/jenkins/workspace/php-laravel/index.html /var/www/html/'

                    // Deploy code using rsync to the same server for index.php
                    sh 'rsync -avz /var/lib/jenkins/workspace/php-laravel/index.php /var/www/html/'

                    // Optional: Copy index.php and index.html to the web server directory
                    sh 'cp /var/lib/jenkins/workspace/php-laravel/index.php /var/www/html/'
                    sh 'cp /var/lib/jenkins/workspace/php-laravel/index.html /var/www/html/'
                }
            }
        }
    }
}
