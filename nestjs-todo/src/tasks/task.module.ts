import { Module } from '@nestjs/common';
import { TasksController } from './task.controller';
import { TaskService } from './task.service';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UserModule } from 'src/users/user.module';
import { Task } from './task.entity';

@Module({
  imports: [TypeOrmModule.forFeature([Task]), UserModule],
  controllers: [TasksController],
  providers: [TaskService],
  // exports: [],
  // Add any other necessary configurations or modules
})
export class TaskModule {}
