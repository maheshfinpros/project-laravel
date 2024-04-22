    agent any
    stages {
        stage('Deploy Code to Same Server') {
            steps {
                script {
                    // Deploy code using rsync to the same server for index.html
                    sh 'rsync -avz /var/lib/jenkins/workspace/php-laravel/index.html /var/www/html/'

                    // Deploy code using rsync to the same server for index.php
                    sh 'rsync -avz /var/lib/jenkins/workspace/php-laravel/index.php /var/www/html/'
                }
            }
        }
    }
}
