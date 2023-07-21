pipeline{
    agent any

    environment {
        def dockerImage = 'nguyenngochuy/disk-partition'
    }

    stages {
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

        stage("Copy & Setup Environment"){
            steps {
                dir("Check-Disk-Service"){
                    sh 'bash ./script-build/setup-evn.sh'
                }
            }
        }

        stage("Build Image") {
            steps {
                dir("Check-Disk-Service"){
                    sh "docker build -t ${dockerImage} ."
                }
            }
        }

        stage("Push Image") {
            steps {
                sh "docker login --username nguyenngochuy --password Huynn@0908#!"
                sh "docker push ${dockerImage}"
            }
        }

        stage("SSH") {
            steps {
                dir("Check-Disk-Service"){
                    sh 'bash ./script-build/ssh-login.sh'
                }
            }
        }

        stage("Pull Image") {
            steps {
                sh "docker login --username nguyenngochuy --password Huynn@0908#!"
                sh "docker pull ${dockerImage}"
            }
        }

        stage("Deployment"){
            steps {
                sh "docker stop disk-partition-service"
                sh "docker rm disk-partition-service"
                sh "docker run -d -p 8000:8000 --name disk-partition-service ${dockerImage}"
            }
        }
    }
}
