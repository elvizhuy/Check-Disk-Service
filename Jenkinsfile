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
        stage("Copy & Setup Eviroiment"){
            steps {
                dir("Check-Disk-Service"){
                    sh 'bash ./script-build/setup-evn.sh'
                }
            }
        }
        stage("Build Image") {
            steps {
                dir("Check-Disk-Service"){
                    sh "docker build -t disk-partition ."
                }
            }
        }

        // stage("Copy Env"){
        //     environment {
        //         CURRENT_DIR = '/var/lib/jenkins/jobs/BE-DiskPartition/workspace/Check-Disk-Service/env'
        //     }
        //     steps {
        //         sh 'docker -v ${CURRENT_DIR}/env:/var/www/html'
        //     }
        // }

        stage("Push Image") {
            environment {
                DOCKER_USERNAME = credentials("NguyenNgocHuy")
                DOCKER_PASSWORD = credentials("Huynn@0908#!")
            }
            steps {
                // sh "docker login --username ${DOCKER_USERNAME} --password-stdin ${DOCKER_PASSWORD}"
                sh "docker login --username NguyenNgocHuy --password Huynn@0908#!"
                sh "docker push nguyenngochuy/isofh_repo:disk-partition"
            }
        }

        // stage("Pull Image") {
        //     environment {
        //         DOCKER_USERNAME = credentials("NguyenNgocHuy")
        //         DOCKER_PASSWORD = credentials("Huynn@0908#!")
        //     }
        //     steps {
        //         sh "docker login --username ${DOCKER_USERNAME} --password-sdtin ${DOCKER_PASSWORD}"
        //         sh "docker pull disk-partition"
        //     }
        // }

    // stage("Run Container"){
    //     steps {
    //         sh 'docker run -d -p 8000:8000 --name disk-partition-service disk-partition'
    //     }
    // }
    }
}
