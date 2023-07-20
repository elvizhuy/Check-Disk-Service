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
                    sh "docker build -t nguyenngochuy/disk-partition ."
                }
            }
        }

        stage("Push Image") {
            steps {
                sh "docker login --username nguyenngochuy --password Huynn@0908#!"
                sh "docker push nguyenngochuy/disk-partition"

            }
        }

        stage("SSH") {
            steps {
                sh 'bash ./script-build/ssh-login.sh'
            }
        }

        stage("Pull Image") {
            steps {
                sh "docker login --username nguyenngochuy --password Huynn@0908#!"
                sh "docker pull nguyenngochuy/disk-partition"
            }
        }

        stage("Deployment"){
            steps {
                sh 'docker run -d -p 8000:8000 --name disk-partition-service disk-partition'
            }
        }
    }
}
