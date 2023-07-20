pipeline{
    agent any
    stages{
        stage("Clean up"){
            steps{
                deleteDir()
            }
        }

        stage("Clone Repository") {
            steps{
                sh "git clone https://github.com/elvizhuy/Check-Disk-Service.git"
            }
        }

        stage("Build Image") {
            steps {
                dir("Check-Disk-Service"){
                    sh "docker build -t disk-partition ."
                }
            }
        }

        stage("Push Image") {
            environment {
                DOCKER_USERNAME = credentials("NguyenNgocHuy")
                DOCKER_PASSWORD = credentials("daniel0908")
            }
            steps {
                sh "docker login --username ${DOCKER_USERNAME} --password ${DOCKER_PASSWORD}"
                sh "docker image push disk-partition"
            }
        }

        // stage("Pull Image") {
        //     environment {
        //         DOCKER_USERNAME = credentials("NguyenNgocHuy")
        //         DOCKER_PASSWORD = credentials("daniel0908")
        //     }
        //     steps {
        //         sh "docker login --username ${DOCKER_USERNAME} --password ${DOCKER_PASSWORD}"
        //         sh "docker pull disk-partition"
        //     }
        // }

        stage("Config Env"){
            environment {
                DB_HOST = credentials("10.0.0.55")
                DB_DATABASE = credentials("quanlybackup")
                DB_USERNAME = credentials("root")
                DB_PASSWORD = credentials("abcd@1234")
            }
            steps {
                dir("Check-Disk-Service"){
                    sh 'cp .env.example .env'
                    sh 'echo DB_HOST=${DB_HOST} >> .env'
                    sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                    sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                    sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                }
            }
        }

        stage("Copy Env"){
            environment {
                CURRENT_DIR = '/Check-Disk-Service/env'
            }
            steps {
                sh 'docker -v ${CURRENT_DIR}/env:/var/www/html'
            }
        }

        stage("Run Container"){
            steps {
                sh 'docker run -d -p 8000:8000 --name disk-partition-service disk-partition'
            }
        }
    }
}
