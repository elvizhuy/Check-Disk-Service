pipeline{
    agent any
    stages{
        stage("Clean up"){
            steps{
                deleteDir()
            }
        }
        stage("Clone Repo") {
            steps{
                sh "git clone https://github.com/elvizhuy/Check-Disk-Service.git"
            }
        }
        stage("Docker build") {
            steps {
                dir("Check-Disk-Service"){
                      // sh "docker rmi check-disk-service"
                sh "docker build -t disk-partition ."
                }
            }
        }
        stage("Build"){
            environment {
                DB_HOST = credentials("10.0.0.55")
                DB_DATABASE = credentials("quanlybackup")
                DB_USERNAME = credentials("root")
                DB_PASSWORD = credentials("abcd@1234")
            }
            steps{
                dir("Check-Disk-Service"){
                    sh 'php --version'
                    sh 'composer install'
                    sh 'composer --version'
                    sh 'cp .env.example .env'
                    sh 'echo DB_HOST=${DB_HOST} >> .env'
                    sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                    sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                    sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                    sh 'php artisan key:generate'
                    sh 'cp .env .env.testing'
                    sh 'php artisan migrate'
                }
            }
        }
        stage("Unit Test"){
            steps{
                dir("Check-Disk-Service"){
                    sh 'php artisan test'
                }
            }
        }
    }

}
