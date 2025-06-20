import { Args, Mutation, Query, Resolver } from "@nestjs/graphql";
import { Status } from "./status.enum";

@Resolver("Attendance")
export class AttendanceResolver {
  private attendances = [
    {
      session: "Physics",
      status: Status.P,
      student: {
        id: 1,
        name: "Naroth",
        idCard: "0987654321",
        className: "A",
      },
      marker: "Pen",
    },
    {
      session: "Chemistry",
      status: Status.AP,
      student: {
        id: 2,
        name: "Nara",
        idCard: "9876123450",
        className: "B",
      },
      marker: "Pen",
    },
    {
      session: "Mathematic",
      status: Status.L,
      student: {
        id: 3,
        name: "Sivhuo",
        idCard: "1111222233",
        className: "C",
      },
      marker: "Pen",
    },
  ];

  private students = [
    {
      id: 1,
      name: "Naroth",
      idCard: "0987654321",
      className: "A",
    },
    {
      id: 2,
      name: "Nara",
      idCard: "9876123450",
      className: "B",
    },
    {
      id: 3,
      name: "Sivhuo",
      idCard: "1111222233",
      className: "C",
    },
  ];

  @Query("countAttendanceByClassName")
  countAttendanceByClassName(@Args("className") className: string) {
    return this.attendances.filter(
      (attendance) => attendance.student.className == className,
    ).length;
  }

  @Query("countAttendanceByStudentId")
  countAttendanceByStudentId(@Args("studentId") studentId: number) {
    return this.attendances.filter(
      (attendance) => attendance.student.id == studentId,
    ).length;
  }

  @Mutation("markAttendance")
  markAttendance(
    @Args("studentId") studentId: number,
    @Args("session") session: string,
    @Args("status") status: Status,
  ) {
    const student = this.students.find((student) => student.id == studentId);

    if (!student) {
      throw new Error("Student not found");
    }

    const attendance = {
      session,
      status,
      student,
      marker: "Tea",
    };
    this.attendances.push(attendance);
    return attendance;
  }

  @Mutation("removeAttendance")
  removeAttendance(
    @Args("session") session: string,
    @Args("studentId") studentId: number,
  ) {
    const attendanceIndex = this.attendances.findIndex(
      (attendance) =>
        attendance.session == session && attendance.student.id == studentId,
    );
    if (attendanceIndex == -1) {
      throw new Error("Attendance not found");
    }
    this.attendances.splice(attendanceIndex, 1);
    return true;
  }
}
