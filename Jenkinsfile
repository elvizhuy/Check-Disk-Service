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
                CURRENT_DIR = '/Check-Disk-Service/env'
            }
            steps{
                dir("Check-Disk-Service"){
                    sh 'cp .env.example .env'
                    sh 'echo DB_HOST=${DB_HOST} >> .env'
                    sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                    sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                    sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                    sh 'php artisan key:generate'

                    // sh 'cp .env .env.testing'
                }
            }
        }
        stage("Copy Env"){
                    steps{
                        sh 'docker -v ${CURRENT_DIR}/env:/var/www/html'
                    }
                }
        // stage("Push"){
        //     steps{
        //         dir("Check-Disk-Service"){
        //             sh 'php artisan test'
        //         }
        //     }
        // }
        stage("Run"){
            steps{
                    sh 'docker run -d -p 8000:8000 --name disk-partition-service disk-partition'
            }
        }
    }
}
